<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Models\NotificationPermission;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use GeoIp2\Database\Reader;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;

class SettingController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
    }
    public function index()
    {
        $user = $this->user;
        $orderCount = $this->user->orderCount();
        $orderTotal = $this->user->orderTotal();
        $advertCount = $this->user->advertCount();

        return view('business.setting.index', compact('user', 'orderCount', 'orderTotal', 'advertCount'));
    }

    public function updateInfo(UserUpdateRequest $request)
    {
        $user = $this->user;
        if ($this->checkEmail($user, $request->email)){
            return back()->with('response', [
                'status' => "error",
                'message' => "E-posta ile kayıtlı başka bir kullanıcımız bulunuyor."
            ]);
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->tax_number = $request->input('tax_number');
        $user->address = $request->input('address');
        if ($request->hasFile('image')){
            $user->image = $request->file('image')->store('userProfiles');
        }
        if ($user->save()){
            return back()->with('response', [
                'status' => "success",
                'message' => "Bilgileriniz Güncellendi"
            ]);
        }
    }

    public function checkEmail($user, $email)
    {
        if ($user->email != $email){
            $existUser = User::whereEmail($email)->whereNotIn('id', [$user->id])->exists();
            if ($existUser){
                return true;
            }
        }
        return false;
    }
    public function security()
    {
        $user = $this->user;
        $orderCount = $this->user->orderCount();
        $orderTotal = $this->user->orderTotal();

        $sessions = Session::where('user_id', $user->id)->get();

        $sessionData = $sessions->map(function($session) {
            $agent = new Agent();
            $agent->setUserAgent($session->user_agent);
            return [
                'browser' => $agent->browser(),
                'device' => $this->getDevice($agent),
                //'region' => $this->getRegion($session->ip_address),
                'last_active' => date('Y.m.d H:i:s', $session->last_activity),
            ];
        });

        return view('business.setting.security.index', compact('user', 'orderCount', 'orderTotal','sessionData'));
    }

    public function invoice()
    {
        $user = $this->user;
        $orderCount = $this->user->orderCount();
        $orderTotal = $this->user->orderTotal();
        $invoices = $user->invoices;
        return view('business.setting.invoice.index', compact('user', 'orderCount', 'orderTotal', 'invoices'));

    }
    public function notificationPermission()
    {
        $user = $this->user;
        $orderCount = $this->user->orderCount();
        $orderTotal = $this->user->orderTotal();

        return view('business.setting.notification.index', compact('user', 'orderCount', 'orderTotal'));

    }

    public function notificationPermissionUpdate(Request $request)
    {
        $user = $this->user;
        $permissions = [
            'order_status' => [
                'email' => $request->has('order_status_email'),
                'sms' => $request->has('order_status_sms'),
                'notification' => $request->has('order_status_notification'),
            ],
            'campaigns' => [
                'email' => $request->has('campaigns_email'),
                'sms' => $request->has('campaigns_sms'),
                'notification' => $request->has('campaigns_notification'),
            ],
            'special_offers' => [
                'email' => $request->has('special_offers_email'),
                'sms' => $request->has('special_offers_sms'),
                'notification' => $request->has('special_offers_notification'),
            ],
            'new_features' => [
                'email' => $request->has('new_features_email'),
                'sms' => $request->has('new_features_sms'),
                'notification' => $request->has('new_features_notification'),
            ],
        ];

        NotificationPermission::updateOrCreate(
            ['user_id' => $user->id],
            ['permissions' => $permissions]
        );

        return back()->with('response', [
           'status' => "success",
           'message' => "Bildirim İzinleriniz Güncellendi"
        ]);
    }
    public function changePassword(Request $request)
    {
        $request->validate([
           'password' => "required|confirmed",
        ]);

        $user = $this->user;
        $user->password = Hash::make($request->input('password'));
        if($user->save()){
            return back()->with('response', [
               'status' => "success",
               'message' => "Şifreniz Başarılı Bir Şekilde Güncellendi"
            ]);
        }
    }

    public function activeTwoFactorAuth(EnableTwoFactorAuthentication $enable, Request $request)
    {
        $user = $this->user;
        if ($user->phone != clearPhone($request->phone)){
            $user->two_factor_confirmed_at = null;
            $user->sms_code = null;
            $user->save();
        }
        $enable($user);

        return redirect()->back()->with('response', [
            'status' => "success",
            'message' => "İki Faktörlü Kimlik Doğrulama Etkinleştirildi",
        ]);
    }
    public function passiveTwoFactorAuth(DisableTwoFactorAuthentication $disable)
    {
        $user = $this->user;

        $disable($user);
        return redirect()->back()->with('response', [
            'status' => "success",
            'message' => "İki Faktörlü Kimlik Doğrulama Kaldırıldı",
        ]);
    }
    private function getDevice(Agent $agent)
    {
        if ($agent->isDesktop()) {
            return 'Desktop';
        } elseif ($agent->isMobile()) {
            return 'Mobile';
        } elseif ($agent->isTablet()) {
            return 'Tablet';
        }
        return 'Unknown';
    }

    private function getRegion($ipAddress)
    {
        $reader = new Reader('/path/to/GeoLite2-City.mmdb'); // GeoLite2 veritabanı dosyasının yolu
        try {
            $record = $reader->city($ipAddress);
            return $record->city->name . ', ' . $record->country->name;
        } catch (\Exception $e) {
            return 'Unknown';
        }
    }
}
