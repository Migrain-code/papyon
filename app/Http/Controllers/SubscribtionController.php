<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PacketOrder;
use App\Models\User;
use App\Services\E_Invoice;
use App\Services\Iyzico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubscribtionController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('business.subscription.index', compact('packages'));
    }
    public function payForm($slug)
    {
        $package = Package::whereSlug($slug)->first();
        return view('business.subscription.payment.index', compact('package'));
    }

    public function pay($slug, Request $request)
    {

        $packet = Package::whereSlug($slug)->first();
        $yearlyCheck = false;
        $amount = $packet->price;
        if (isset($request->yearly_check)){
            $yearlyCheck = true;
            $amount = $packet->total_price;
        }

        $count = 1;
        $kdv = 20;

        $parts = explode(' ', $request->name);

        $surname = array_pop($parts);
        $name = implode(' ', $parts);

        $partsDate = explode('/', $request->expiry_date);

        $month = $partsDate[0];
        $year = $partsDate[1];

        $cvv = $request->cvv_code;
        $cardName = $request->name;
        $cardNumber = clearNumber($request->card_number);

        $payment = new \App\Services\Iyzico();
        $payment->setConversationId(rand(1000, 10000000000));
        $payment->setPrice($amount);
        $payment->setCallbackUrl(route('business.subscribtion.payment.callback', [$packet->id, authUser()->id]) . '?count=' . $count . '&kdv=' . $kdv .'&yearlyCheck=' . $yearlyCheck);
        $payment->setCard($cardName,$cardNumber, $month, $year, $cvv);
        $payment->setBuyer(authUser()->id, $name, $surname, authUser()->phone, authUser()->email);
        $payment->setShippingAddress();
        $payment->setBillingAddress();
        $payment->addBasketItem($packet->id, $packet->name, 'Paket', $amount);
        $response = $payment->createPaymentRequest();

        if ($response->getStatus() == 'failure') {
            $request->flash();
            return back()->with('response', [
                'status' => 'error',
                'message' => $response->getErrorMessage()
            ]);
        }

        echo $response->getHtmlContent();
    }
    public function callback(Request $request, Package $package, User $user)
    {
        Auth::guard('web')->loginUsingId($user->id);
        $user = authUser();

        $payment = (new Iyzico())->completePayment($request->paymentId);

        if ($payment->getStatus() == 'success') {

            $packetOrder = new PacketOrder();
            $packetOrder->package_id = $package->id;
            $packetOrder->user_id = $user->id;
            $packetOrder->price = $payment->getPrice();
            $packetOrder->tax = $request->kdv ?? 0;
            $packetOrder->discount = $request->discount ?? 0;
            $packetOrder->payment_id = $payment->getPaymentId();
            $packetOrder->payment_type = 'CARD';
            $packetOrder->status = 'PAYED';
            $packetOrder->save();
            /*$invoice = $this->createEInvoice($packetOrder);

            if ($invoice != false){
                $packetOrder->invoice_no = $invoice->guid;
                $packetOrder->invoice_url = $invoice->url;
            } else{
                $packetOrder->invoice_no = "FALSE";
            }
            $packetOrder->save();*/
            $user->package_id = $package->id;
            $user->start_time = now();
            $user->end_time = now()->addDays($request->yearlyCheck == true ? 365 : 30);
            $user->save();

            //$user->setPermission($packet->id);
            return to_route('business.subscribtion.payment.success', ['order-no' => $packetOrder->id]);
        }
        return to_route('business.subscribtion.payment.fail');
    }

    public function createEInvoice($packetOrder)
    {
        $originalPrice = $packetOrder->price + $packetOrder->discount;
        $invoiceGenerator = new E_Invoice();
        $invoiceGenerator->createCustomer($packetOrder->business_id, $packetOrder->business->name, $packetOrder->business->address);
        $invoiceGenerator->createAmount($originalPrice, $packetOrder->discount);
        $invoiceGenerator->createProduct($packetOrder->package_id, $packetOrder->package->name. " Üyelik Paketi", $packetOrder->discount);
        $invoiceGenerator->createInvoice($packetOrder->id);
        $response = json_decode($invoiceGenerator->sendInvoice());

        if ($response->error == ""){
            return $response;
        } else{
            return false;
        }
    }
    public function success(Request $request)
    {
        $order = PacketOrder::find($request->input('order-no'));

        if ($order) {
            $package = $order->packet;

            return view('business.subscription.payment.success', compact('order', 'package'));
        } else {
            return to_route('business.home')->with('response', [
                'status' => 'error',
                'message' => "Sipariş Bilgisi Bulunamadı"
            ]);
        }

    }

    public function fail()
    {
        return view('business.subscription.payment.fail');
    }


}
