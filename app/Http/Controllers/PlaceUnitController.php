<?php

namespace App\Http\Controllers;

use App\Models\PlaceUnit;
use Illuminate\Http\Request;

class PlaceUnitController extends Controller
{
    private $business;
    private $user;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $placeUnit = new PlaceUnit();
        $placeUnit->name = $request->input('unit_name');
        $placeUnit->place_id = $this->business->id;
        if ($placeUnit->save()){
            return response()->json([
               'status' => "success",
               'message' => "Yeni Birim Alanı Eklendi",
               'units' => $this->business->units,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PlaceUnit $placeUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlaceUnit $placeUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlaceUnit $placeUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlaceUnit $placeUnit)
    {
        //
    }
}
