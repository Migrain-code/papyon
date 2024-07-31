<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlaceVisitor;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlaceMenuController extends Controller
{
    public function index($slug, Request $request)
    {
        $place = Place::whereSlug($slug)->first();
        $placeVisitor = new PlaceVisitor();
        $placeVisitor->place_id = $place->id;
        $placeVisitor->ip_address = $request->ip();
        $placeVisitor->save();
        Session::put('place', $place);
        return to_route('menu.index', $place->slug);
    }

    public function table($code, Request $request)
    {
        $table = Table::where('qr_name', $code)->first();
        $place = $table->place;
        $placeVisitor = new PlaceVisitor();
        $placeVisitor->place_id = $place->id;
        $placeVisitor->ip_address = $request->ip();
        $placeVisitor->save();
        Session::put('table', $table);
        Session::put('place',  $place);
        return to_route('menu.index', $place->slug);
    }

    public function notify()
    {
        return view('qr_menu.notify.index');
    }
}
