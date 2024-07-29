<?php

namespace App\Http\Controllers;

use App\Models\DemoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class DemoRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.demo.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'company_name' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'company_name' => "Şirket Adı",
        ]);
        $contact = new DemoRequest();
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->company_name = $request->input('company_name');
        $contact->note = $request->input('message');
        if ($contact->save()){
            return to_route('admin.demoRequest.index')->with('response', [
                'status' => "success",
                'message' => "Talep Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DemoRequest $demoRequest, Request $request)
    {
        $demoRequest->status = $request->statusCode;
        if ($demoRequest->save()){
            return response()->json([
                'status' => "success",
                'message' => "Talep Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemoRequest $demoRequest)
    {
        return view('admin.demo.edit.index', compact('demoRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DemoRequest $demoRequest)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'company_name' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'company_name' => "Şirket Adı",
        ]);

        $demoRequest->name = $request->input('name');
        $demoRequest->mail = $request->input('mail');
        $demoRequest->phone = $request->input('phone');
        $demoRequest->company_name = $request->input('company_name');
        $demoRequest->note = $request->input('message');
        if ($demoRequest->save()){
            return to_route('admin.demoRequest.index')->with('response', [
                'status' => "success",
                'message' => "Talep güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = DemoRequest::orderBy('status', 'asc')->latest();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'DemoRequest', '', 'orderChecks');
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
                        'buttonLink' => route('admin.demoRequest.edit', $q->id),
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
