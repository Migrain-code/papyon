<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceAddRequest;
use App\Models\DayList;
use App\Models\Place;
use App\Models\PlaceWifi;
use App\Models\PlaceWorkTime;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = $this->user->places()->orderBy('order_number', 'asc')->whereStatus(1)->paginate(6);
        return view('business.place.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dayList = DayList::all();
        return view('business.place.create.index', compact('dayList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaceAddRequest $request)
    {
        $place = new Place();
        $place->user_id = $this->user->id;
        $place->order_number = 0;
        $place->is_default = 1;
        $place->status = 1;
        $place->name = $request->input('place_name');
        $place->slug = Str::slug($request->input('place_link'));
        $place->instagram = $request->input('instagram');
        $place->price_type = $request->input('price_type');
        $place->other_languages = $request->other_languages;
        $place->main_language = $request->input('main_language');
        $place->theme_id = $request->input('theme_id');
        $place->address = $request->input('address');
        $place->latitude = $request->input('latitude');
        $place->longitude = $request->input('longitude');
        $place->maps_embed = $request->embed;
        $place->logo = $request->file('logo')->store('placeLogos');
        $place->save();

        $dayList = DayList::all();
        foreach ($dayList as $day){
            $workTime = new PlaceWorkTime();
            $workTime->place_id = $place->id;
            $workTime->day_id = $day->id;
            $workTime->status = in_array($day->id, $request->day_opened);
            $workTime->start_time = $request->day_open_clock[$day->id];
            $workTime->end_time = $request->day_close_clock[$day->id];
            $workTime->save();
        }

        $placeWifi = new PlaceWifi();
        $placeWifi->place_id = $place->id;
        $placeWifi->pass = $request->input('wifi_password');
        $placeWifi->save();


        $serviceData = $request->only([
            'call_a_waiter',
            'call_a_waiter_phone',
            'order_type',
            'table_phone',
            'request_account',
            'request_account_phone',
            'call_a_valet',
            'valet_phone',
            'call_a_taxi',
            'taxi_phone',
            'take_away_order',
            'take_away_phone',
            'package_order',
            'package_order_phone',
            'delivery_fee'
        ]);

        $serviceData['place_id'] = $place->id;
        $place->createService($serviceData);
        return to_route('business.place.index')->with('response', [
           'status' => "success",
           'message' => "Mekan Oluşturuldu"
        ]);
    }

    /**
     * Set Default Place
     */
    public function show(Place $place)
    {
        $this->user->places()->update(['is_default' => 0]);
        $place->is_default = 1;
        if ($place->save()){
            return to_route('business.place.index')->with('response', [
                'status' => "success",
                'message' => $place->name ." Adlı Mekana Geçiş Yaptınız"
            ]);
        }
    }

    public function clonePlace(Place $place)
    {
        $place->clone();
        return to_route('business.place.index')->with('response', [
            'status' => "success",
            'message' => $place->name ." Adlı Mekanı Kopyaladınız"
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        $dayList = DayList::all();
        $workTimes = $place->workTimes;

        return view('business.place.edit.index', compact('place', 'dayList', 'workTimes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        //$request->dd();
        $place->name = $request->input('place_name');
        $place->slug = Str::slug($request->input('place_link'));
        $place->instagram = $request->input('instagram');
        $place->price_type = $request->input('price_type');
        $place->other_languages = $request->other_languages;
        $place->main_language = $request->input('main_language');
        $place->theme_id = $request->input('theme_id');
        $place->address = $request->input('address');
        $place->latitude = $request->input('latitude');
        $place->longitude = $request->input('longitude');
        $place->maps_embed = $request->embed;
        if ($request->hasFile('logo')){
            $place->logo = $request->file('logo')->store('placeLogos');

        }
        $place->save();

        $dayList = DayList::all();
        $place->workTimes()->delete();
        foreach ($dayList as $day){
            $workTime = new PlaceWorkTime();
            $workTime->place_id = $place->id;
            $workTime->day_id = $day->id;
            $workTime->status = in_array($day->id, $request->day_opened);
            $workTime->start_time = $request->day_open_clock[$day->id];
            $workTime->end_time = $request->day_close_clock[$day->id];
            $workTime->save();
        }

        $placeWifi = $place->wifi;
        $placeWifi->pass = $request->input('wifi_password');
        $placeWifi->pass = $request->input('wifi_name');
        $placeWifi->save();

        $serviceData = $request->only([
            'call_a_waiter',
            'call_a_waiter_phone',
            'order_type',
            'table_phone',
            'request_account',
            'request_account_phone',
            'call_a_valet',
            'valet_phone',
            'call_a_taxi',
            'taxi_phone',
            'take_away_order',
            'take_away_phone',
            'package_order',
            'package_order_phone',
            'delivery_fee'
        ]);

        $serviceData['place_id'] = $place->id;
        $place->updateService($serviceData);
        return to_route('business.place.index')->with('response', [
            'status' => "success",
            'message' => "Mekan Bilgileriniz Güncellendi"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
