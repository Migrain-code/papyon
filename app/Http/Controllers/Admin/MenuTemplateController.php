<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuTemplate;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class MenuTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.menu-template.index');
    }

    public function store(Request $request)
    {
        $template = new Template();
        $template->name = $request->input('title');
        $template->image = $request->file('image')->store('menuTemplateImages');
        if ($template->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Tema Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuTemplate $menuTemplate)
    {
        return view('admin.menu-template.edit.index', compact('menuTemplate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuTemplate $menuTemplate)
    {
        $menuTemplate->name = $request->input('title');
        if ($request->hasFile('image')){
            $menuTemplate->image = $request->file('image')->store('menuTemplateImages');
        }
        if ($menuTemplate->save()){
            return to_route('admin.menu-template.index')->with('response',[
                'status' => "success",
                'message' => "Tema Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = MenuTemplate::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Template', 'Blogları', 'orderChecks');
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at->format('d.m.Y H:i');
            })
            ->editColumn('name', function ($q) {
                return Str::limit($q->name, 20);
            })
            ->editColumn('image', function ($q) {
                return html()->img(storage($q->image))->style('width:35px');
            })
            ->addColumn('action', function ($q) {
                $html = "";
                $buttons = [
                    [
                        'buttonText' => "Düzenle",
                        'buttonLink' => route('admin.menu-template.edit', $q->id),
                        'id' => 0,
                    ],
                ];
                $html.= create_dropdown_button($buttons, $q->id, 'updateStatus');

                return $html;
            })
            ->rawColumns(['id', 'action', 'name', 'image'])
            ->make(true);

    }


}
