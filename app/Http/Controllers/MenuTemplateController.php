<?php

namespace App\Http\Controllers;

use App\Models\MenuTemplate;
use Illuminate\Http\Request;

class MenuTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = MenuTemplate::all();
        return view('business.print.index', compact('templates'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuTemplate $menuTemplate)
    {
        return view('business.print.template-' . $menuTemplate->id . '.index');
    }


}
