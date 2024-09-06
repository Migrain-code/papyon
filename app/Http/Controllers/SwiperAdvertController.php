<?php

namespace App\Http\Controllers;

use App\Http\Requests\SwiperAdvert\AdvertAddRequest;
use App\Models\SwiperAdvert;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SwiperAdvertController extends Controller
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
        return view('business.swiper-advert.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvertAddRequest $request)
    {

        $swiperAdvert = new SwiperAdvert();
        $swiperAdvert->place_id = $this->business->id;
        $swiperAdvert->image = $request->file('image')->store('swiperAdvert');
        $swiperAdvert->status = 1;
        $swiperAdvert->save();
        return back()->with('response',[
            'status' => "success",
            'message' => "Reklam Oluşturuldu"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SwiperAdvert $swiperAdvert, Request $request)
    {
        $swiperAdvert->status = $request->statusCode;
        if ($swiperAdvert->save()){
            return response()->json([
                'status' => "success",
                'message' => "Reklam Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SwiperAdvert $swiperAdvert)
    {
        return view('business.swiper-advert.edit.index', compact('swiperAdvert'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SwiperAdvert $swiperAdvert)
    {
        if ($request->hasFile('image')){
            $swiperAdvert->image = $request->file('image')->store('swiperAdvert');
            $swiperAdvert->save();
        }
        $swiperAdvert->status = 1;
        return to_route('business.swiper-advert.index')->with('response',[
            'status' => "success",
            'message' => "Reklam Güncellendi"
        ]);
    }

    public function datatable(Request $request)
    {
        $adverts = SwiperAdvert::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'SwiperAdvert', 'Reklamlar', 'orderChecks');
            })
            ->editColumn('image', function ($q) {
                return html()->img(storage($q->image))->style('width:30px;height:30px');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->addColumn('name', function ($q) {
                return "Reklam: ". $q->id;
            })
            ->addColumn('status', function ($q) {
                return $q->advertStatus('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('business.swiper-advert.edit', $q->id),
                        'id' => 0,
                    ],
                    [
                        'buttonText' => "Yayınla",
                        'buttonLink' => null,
                        'id' => 1,
                    ],
                    [
                        'buttonText' => "Yayından Kaldır",
                        'buttonLink' => null,
                        'id' => 0,
                    ],
                ];
                $html.= create_dropdown_button($buttons, $q->id, 'updateStatus');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'status'])
            ->make(true);

    }

}
