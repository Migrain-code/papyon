<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }
    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $item) {
            if ($request->hasFile($key)) {
                $item = $request->file($key)->store('settingImage');
            }

            $query = Setting::query()->whereName($key)->first();
            if ($query) {
                if ($query->value != $item) {
                    $query->name = $key;
                    $query->value = $item;
                    $query->save();
                }
            } else {
                $newQuery = new Setting();
                $newQuery->name = $key;
                $newQuery->value = $item;
                $newQuery->save();
            }
        }

        if (\request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ayarlar başarıyla kaydedildi.'
            ]);
        } else {
            return back()->with('response', [
                'status'=>"success",
                'message'=>"Ayarlar Güncellendi"
            ]);
        }
    }
}
