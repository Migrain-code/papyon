<?php

namespace App\Http\Controllers;

use App\Models\MenuDesign;
use App\Models\ThemeColor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        if($this->menuOrders->count() == 0){
            $this->business->createMenu();
        }
        if($this->business->colors->count() == 0){
            $this->business->createColor();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->business = $this->user->place();
        $menuOrders = $this->business->menuOrders->where('status', 1);
        return view('business.theme.index', compact('menuOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $place =  $this->user->place();
        $menuDesign = $place->menuOrders;

        $colors = $place->colors;
        $newColors = [];
        foreach ($colors as $color){
            $newColors[$color->name] = $color->value;
        }
        $colors = collect($newColors);

        return view('business.theme.tabs.color', compact('place', 'menuDesign', 'colors'));
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
        foreach ($request->except(['_token', '_method']) as $key => $item) {

            $query = ThemeColor::query()->where('place_id', $this->business->id)->whereName($key)->first();
            if ($query) {
                if ($query->value != $item) {
                    $query->name = $key;
                    $query->value = $item;
                    $query->save();
                }
            } else {
                $newQuery = new ThemeColor();
                $newQuery->place_id = $this->business->id;
                $newQuery->name = $key;
                $newQuery->value = $item;
                $newQuery->save();
            }
        }
        $result = $this->business->updateSetupPercentage();

        return back()->with('response', [
            'status'=>"success",
            'message'=>"Ayarlar Güncellendi"
        ]);
    }

}
