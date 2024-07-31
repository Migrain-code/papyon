<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allergen;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.allergen.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $allergen = new Allergen();
        $allergen->name = $request->input('title');
        $allergen->icon = $request->file('icon')->store('allergenIcons');
        $allergen->status = 1;
        if ($allergen->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Alerjen Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Allergen $allergen, Request $request)
    {
        $allergen->status = $request->statusCode;
        if ($allergen->save()){
            return response()->json([
                'status' => "success",
                'message' => "Alerjen Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Allergen $allergen)
    {
        return view('admin.allergen.edit.index', compact('allergen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Allergen $allergen)
    {
        $allergen->name = $request->input('title');
        if ($request->hasFile('icon')){
            $allergen->icon = $request->file('icon')->store('allergenIcons');
        }
        $allergen->status = 1;
        if ($allergen->save()){
            return to_route('admin.allergen.index')->with('response',[
                'status' => "success",
                'message' => "Alerjen Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = Allergen::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Allergen', 'Blogları', 'orderChecks');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('name', function ($q) {
                return Str::limit($q->name, 20);
            })
            ->addColumn('status', function ($q) {
                return $q->advertStatus('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('admin.allergen.edit', $q->id),
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
