<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.feature.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $feature = new Feature();
        $feature->title = $request->input('title');
        $feature->slug = Str::slug($request->input('title'));
        $feature->meta_title = $request->input('meta_title');
        $feature->meta_description = $request->input('meta_description');
        $feature->description = $request->input('blog_content');
        if ($request->hasFile('image')){
            $feature->image = $request->file('image')->store('blogImages');
        }
        if ($feature->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Özellik Eklendi"
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature, Request $request)
    {
        $feature->status = $request->statusCode;
        if ($feature->save()){
            return response()->json([
                'status' => "success",
                'message' => "Özllik Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('admin.feature.edit.index', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $feature->title = $request->input('title');
        $feature->slug = Str::slug($request->input('title'));
        $feature->meta_title = $request->input('meta_title');
        $feature->meta_description = $request->input('meta_description');
        $feature->description = $request->input('blog_content');
        if ($request->hasFile('image')){
            $feature->image = $request->file('image')->store('blogImages');
        }
        if ($feature->save()){
            return to_route('admin.feature.index')->with('response',[
                'status' => "success",
                'message' => "Özellik Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = Feature::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Feature', 'Özellikleri', 'orderChecks');
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
                        'buttonLink' => route('admin.feature.edit', $q->id),
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
