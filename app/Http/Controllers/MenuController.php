<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Place;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $place = Place::find(1);
        $menus = $place->menus;
        /*if ($menus->count() == 1){
            return to_route('business.menu.edit', $menus->first()->id);
        }*/
        return view('business.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $place = Place::find(1);
        $menu = new Menu();
        $menu->place_id = $place->id;
        $menu->name = $request->input('name');
        $menu->image = $request->file('menu_image')->store('menuLogos');
        if ($menu->save()) {
            if ($place->menus->count() == 1){
                $menu->is_default = 1;
                $menu->save();
            }
            return to_route('business.menu.index')->with('response', [
                'status' => "success",
                'message' => "Menü Başarılı Bir Şekilde Oluşturuldu"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = $menu->categories;

        return view('business.menu.edit.index', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
