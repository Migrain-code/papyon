<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Entegration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class EntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.entegration.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entegration = new Entegration();
        $entegration->title = $request->input('title');
        $entegration->link = $request->input('link');
        $entegration->image = $request->file('image')->store('entegrationImages');
        if ($entegration->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Entegrasyon Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Entegration $entegration, Request $request)
    {
        $entegration->status = $request->statusCode;
        if ($entegration->save()){
            return response()->json([
                'status' => "success",
                'message' => "Entegrasyon Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entegration $entegration)
    {
        return view('admin.entegration.edit.index', compact('entegration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entegration $entegration)
    {
        $entegration->title = $request->input('title');
        $entegration->link = $request->input('link');
        if ($request->hasFile('image')){
            $entegration->image = $request->file('image')->store('entegrationImages');
        }
        if ($entegration->save()){
            return to_route('admin.entegration.index')->with('response',[
                'status' => "success",
                'message' => "Entegrasyon Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = Entegration::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Entegration', 'Entegrasyonları', 'orderChecks');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('title', function ($q) {
                return Str::limit($q->title, 20);
            })
            ->addColumn('status', function ($q) {
                return $q->advertStatus('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('admin.entegration.edit', $q->id),
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
