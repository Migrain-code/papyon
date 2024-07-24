<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }

    public function visitors()
    {

        $sales = [];
        for ($i = 1; $i <= 12; $i++) {
            $sales[] = $this->business->visitors()->whereMonth('created_at', $i)->count();
        }
        return $sales;
    }

    public function index()
    {
        $visitors = $this->visitors();
        $totalVisitor = array_sum($visitors);
        $totalOrder = $this->business->orders->where('status', 0)->count();
        $menuCount = $this->business->menus->count();
        $suggestionCount = $this->business->suggestions->count();
        return view('business.home.index', compact('visitors', 'totalOrder', 'totalVisitor', 'menuCount', 'suggestionCount'));
        //return view('business.auth.two-factor');
    }

    public function twoFactorShow()
    {
        return view('business.auth.two-factor');
    }

    public function twoFactorSms(Request $request)
    {
        $user = $request->user();
        if ($user->sms_code == $request->otp) {
            $user->two_factor_confirmed_at = now();
            $user->sms_code = null;
            $user->save();
            return to_route('business.home');
        } else {
            return back()->with('response', [
                'status' => "error",
                'message' => "Doğrulama Kodu Hatalı",
            ]);
        }
    }

    public function resendCode(Request $request)
    {

        $user = $request->user();
        $user->sms_code = rand(100000, 999999);
        $user->save();

        Sms::send($user->phone, 'Papyon sistemine giriş için doğrulama kodunuz: ' . $user->sms_code);

        return back()->with('response', [
            'status' => "success",
            'message' => "Doğrulama Kodunuz Gönderildi"
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->two_factor_confirmed_at = null;
        $user->sms_code = null;
        $user->save();
        Auth::guard('web')->logout();

        return to_route('login');
    }
}
