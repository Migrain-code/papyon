<?php

namespace App\Http\Controllers;

use App\Models\Session;
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

    public function security()
    {
        $user = $this->user;
        $orderCount = $this->user->orderCount();
        $orderTotal = $this->user->orderTotal();
        $advertCount = $this->user->advertCount();
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

        return view('business.setting.security.index', compact('user', 'orderCount', 'orderTotal', 'advertCount','sessionData'));
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

    public function activeTwoFactorAuth(EnableTwoFactorAuthentication $enable)
    {
        $user = $this->user;

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
