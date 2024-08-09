<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.template.index');
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
        $template = new Template();
        $template->name = $request->input('title');
        $template->image = $request->file('image')->store('templateImages');
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
    public function edit(Template $template)
    {
        return view('admin.template.edit.index', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        $template->name = $request->input('title');
        if ($request->hasFile('image')){
            $template->image = $request->file('image')->store('templateImages');
        }
        if ($template->save()){
            return to_route('admin.template.index')->with('response',[
                'status' => "success",
                'message' => "Tema Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = Template::all();
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
                        'buttonLink' => route('admin.template.edit', $q->id),
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
