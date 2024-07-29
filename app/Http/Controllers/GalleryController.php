<?php

namespace App\Http\Controllers;

use App\Models\Entegration;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Html\Html;
use Yajra\DataTables\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.gallery.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => "required",
        ]);
        $gallery = new Gallery();
        $gallery->image = $request->file('image')->store('galleryImages');
        if ($gallery->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Görsel Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery, Request $request)
    {
        $gallery->status = $request->statusCode;
        if ($gallery->save()){
            return response()->json([
                'status' => "success",
                'message' => "Görsel Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit.index', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $gallery->image = $request->file('image')->store('galleryImages');
        if ($gallery->save()){
            return to_route('admin.gallery.index')->with('response',[
                'status' => "success",
                'message' => "Görsel Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = Gallery::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Gallery', 'Görseli', 'orderChecks');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('image', function ($q) {
                return \html()->img(storage($q->image))->style('width: 35px; height:35px');
            })
            ->addColumn('status', function ($q) {
                return $q->advertStatus('icon');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('admin.gallery.edit', $q->id),
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
