<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\PartnershipRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PartnershipRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.partnership.index', compact('cities'));
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
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company_age' => 'required',
            'city_id' => 'required',
            'customer_count' => 'required',
            'target_customer_count' => 'required',
        ], [], [
            'name' => "Ad Soyad",
            'phone' => "Telefon",
            'email' => "E-posta",
            'company_age' => "Şirket Yaşı",
            'city_id' => "Şehir",
            'customer_count' => "Müşteri Sayısı",
            'target_customer_count' => "Hedef Müşteri Sayısı",
        ]);
        $partnerShipRequest = new PartnershipRequest();
        $partnerShipRequest->name = $request->input('name');
        $partnerShipRequest->phone = $request->input('phone');
        $partnerShipRequest->email = $request->input('email');
        $partnerShipRequest->company_age = $request->input('company_age');
        $partnerShipRequest->city_id = $request->input('city_id');
        $partnerShipRequest->customer_count = $request->input('customer_count');
        $partnerShipRequest->goal_customer_count = $request->input('target_customer_count');
        $partnerShipRequest->other_company = $request->input('other_companies');
        $partnerShipRequest->note = $request->input('note');
        if($partnerShipRequest->save()){
            return back()->with('response', [
                'status' => "success",
                'message' => "Talep Oluşturuldu"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PartnershipRequest $partnership, Request $request)
    {
        $partnership->status = $request->statusCode;
        if ($partnership->save()){
            return response()->json([
                'status' => "success",
                'message' => "Talep Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartnershipRequest $partnership)
    {
        $cities = City::all();
        return view('admin.partnership.edit.index', compact('partnership', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartnershipRequest $partnership)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company_age' => 'required',
            'city_id' => 'required',
            'customer_count' => 'required',
            'target_customer_count' => 'required',
        ], [], [
            'name' => "Ad Soyad",
            'phone' => "Telefon",
            'email' => "E-posta",
            'company_age' => "Şirket Yaşı",
            'city_id' => "Şehir",
            'customer_count' => "Müşteri Sayısı",
            'target_customer_count' => "Hedef Müşteri Sayısı",
        ]);

        $partnership->name = $request->input('name');
        $partnership->phone = $request->input('phone');
        $partnership->email = $request->input('email');
        $partnership->company_age = $request->input('company_age');
        $partnership->city_id = $request->input('city_id');
        $partnership->customer_count = $request->input('customer_count');
        $partnership->goal_customer_count = $request->input('target_customer_count');
        $partnership->other_company = $request->input('other_companies');
        $partnership->note = $request->input('note');
        if($partnership->save()){
            return to_route('admin.partnership.index')->with('response', [
                'status' => "success",
                'message' => "Talep Güncellendi"
            ]);
        }
    }


    public function datatable()
    {
        $adverts = PartnershipRequest::orderBy('status', 'asc')->latest();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'PartnershipRequest', '', 'orderChecks');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('name', function ($q) {
                return Str::limit($q->name, 20);
            })
            ->editColumn('phone', function ($q) {
                return createPhone($q->phone, formatPhone($q->phone));
            })
            ->editColumn('status', function ($q) {
                return $q->advertStatus('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Detay",
                        'buttonLink' => route('admin.partnership.edit', $q->id),
                        'id' => 0,
                    ],
                    [
                        'buttonText' => "Arandı",
                        'buttonLink' => null,
                        'id' => 1,
                    ],
                    [
                        'buttonText' => "Aranmadı",
                        'buttonLink' => null,
                        'id' => 0,
                    ],
                ];
                $html.= create_dropdown_button($buttons, $q->id, 'updateStatus');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'status', 'phone'])
            ->make(true);

    }

}
