<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class MaterialController extends Controller
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
        $menu = $this->business->activeMenu();
        return view('business.material.index', compact('menu'));
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
            'title' => 'required',
        ], [
            'title' => 'Sos Adı',
        ]);
        $material = new Material();
        $material->place_id = $this->business->id;
        $material->name = $request->input('title');
        if ($material->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Yeni Malzeme Eklendi"
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material, Request $request)
    {
        $material->status = $request->statusCode;
        if ($material->save()){
            return response()->json([
                'status' => "success",
                'message' => "Duyuru Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('business.material.edit.index', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title' => 'Başlık',

        ]);
        $material->name = $request->input('title');
        if ($material->save()){
            return to_route('business.material.index')->with('response',[
                'status' => "success",
                'message' => "Malzeme Bilgisi Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = $this->business->materials;
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Souce', 'Duyurları', 'orderChecks');
            })
            ->editColumn('description', function ($q) {
                return Str::limit($q->description, 50);
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
                        'buttonLink' => route('business.souce.edit', $q->id),
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
