<?php

namespace App\Http\Controllers;

use App\Models\MenuLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class MenuLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.language.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $language = new MenuLanguage();
        $language->name = $request->input('title');
        $language->sort_name = $request->input('sort_name');
        if ($language->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Dil Eklendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuLanguage $language)
    {
        return view('admin.language.edit.index', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuLanguage $language)
    {
        $language->name = $request->input('title');
        $language->sort_name = $request->input('sort_name');
        if ($language->save()){
            return to_route('admin.language.index')->with('response',[
                'status' => "success",
                'message' => "Dil Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = MenuLanguage::all();
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

            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('admin.language.edit', $q->id),
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
