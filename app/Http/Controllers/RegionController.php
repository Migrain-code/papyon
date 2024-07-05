<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $region = new Region();
        $region->place_id = $this->business->id;
        $region->name = $request->input('region_name');
        if ($region->save()){
            return back()->with('response', [
               'status' => "success",
               'message' => "Bölge Eklendi"
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $region->name = $request->input('region_new_name');
        if ($region->save()){
            return back()->with('response', [
                'status' => "success",
                'message' => "Bölge Bilgisi Güncellendi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->tables()->delete();
        if ($region->delete()){
            return response()->json([
               'status' => "success",
               'message' => "Bölge Kaydı ve İçerisindeki Masalar Silindi",
            ]);
        }
    }
}
