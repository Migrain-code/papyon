<?php

namespace App\Http\Controllers;

use App\Models\MenuDesign;
use Illuminate\Http\Request;

class MenuDesignController extends Controller
{
    private $business;
    private $user;
    private $menuOrders;

    public function __construct()
    {
        $this->user = auth('web')->user();
        $this->business = $this->user->place();
        $this->menuOrders = $this->business->menuOrders;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuOrders = $this->business->menuOrders;
        return view('business.theme.index', compact('menuOrders'));
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
        foreach ($request->order as $order){
            $menuDesign = MenuDesign::find($order["id"]);
            $menuDesign->order_number = $order["position"];
            $menuDesign->save();
        }
        return response()->json([
           'status' => "success",
           'message' => "Menu Sıralamanız Güncellendi"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuDesign $menuDesign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuDesign $menuDesign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuDesign $menuDesign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuDesign $menuDesign)
    {
        //
    }
}
