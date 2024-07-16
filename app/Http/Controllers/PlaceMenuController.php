<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlaceMenuController extends Controller
{
    public function index($slug)
    {
        $place = Place::whereSlug($slug)->first();
        Session::put('place', $place);
        return to_route('menu.index', $place->slug);
    }

    public function table($code)
    {
        $table = Table::where('qr_name', $code)->first();
        Session::put('table', $table);
        Session::put('place', $table->place);
        return to_route('menu.index', $table->place->slug);
    }

    public function notify()
    {
        return view('qr_menu.notify.index');
    }
}
