<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog-category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->input('title');
        $blogCategory->meta_title = $request->input('meta_title');
        $blogCategory->meta_description = $request->input('meta_description');
        $blogCategory->slug = Str::slug($request->input('title'));
        if ($blogCategory->save()){
            return back()->with('response',[
                'status' => "success",
                'message' => "Blog Kategorisi Eklendi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory, Request $request)
    {
        $blogCategory->status = $request->statusCode;
        if ($blogCategory->save()){
            return response()->json([
                'status' => "success",
                'message' => "Kategori Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-category.edit.index', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $blogCategory->slug = Str::slug($request->input('title'));
        $blogCategory->name = $request->input('title');
        $blogCategory->meta_title = $request->input('meta_title');
        $blogCategory->meta_description = $request->input('meta_description');
        if ($blogCategory->save()){
            return to_route('admin.blogCategory.index')->with('response',[
                'status' => "success",
                'message' => "Blog Kategorisi Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = BlogCategory::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'BlogCategory', 'Blogları', 'orderChecks');
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
                        'buttonLink' => route('admin.blogCategory.edit', $q->id),
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
