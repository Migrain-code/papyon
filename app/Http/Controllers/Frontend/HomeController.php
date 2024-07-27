<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front-end.welcome.index');
    }

    public function proparties()
    {
        return view('front-end.property.index');
    }
    public function faq()
    {
        return view('front-end.faq.index');
    }
    public function entegration()
    {
        return view('front-end.entegration.index');
    }
    public function package()
    {
        return view('front-end.package.index');
    }
    public function partnership()
    {
        $cities = City::all();
        return view('front-end.partnership.index', compact('cities'));
    }

    public function contact()
    {
        return view('front-end.contact.index');
    }
}
