<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->category_id = $request->input('category_id');
        $blog->title = $request->input('title');
        $blog->slug = Str::slug($request->input('title'));
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->description = $request->input('blog_content');
        if ($request->hasFile('image')){
            $blog->image = $request->file('image')->store('blogImages');
        }
        if ($blog->save()){
            return back()->with('response',[
               'status' => "success",
               'message' => "Blog Eklendi"
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog, Request $request)
    {
        $blog->status = $request->statusCode;
        if ($blog->save()){
            return response()->json([
                'status' => "success",
                'message' => "Blog Durumu Güncellendi"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('admin.blog.edit.index', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->category_id = $request->input('category_id');
        $blog->title = $request->input('title');
        $blog->slug = Str::slug($request->input('title'));
        $blog->meta_title = $request->input('meta_title');
        $blog->meta_description = $request->input('meta_description');
        $blog->description = $request->input('blog_content');
        if ($request->hasFile('image')){
            $blog->image = $request->file('image')->store('blogImages');
        }
        if ($blog->save()){
            return to_route('admin.blog.index')->with('response',[
                'status' => "success",
                'message' => "Blog Güncellendi"
            ]);
        }
    }

    public function datatable()
    {
        $adverts = Blog::all();
        return DataTables::of($adverts)
            ->editColumn('id', function ($q) {
                return createCheckbox($q->id, 'Blog', 'Blogları', 'orderChecks');
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
                        'buttonLink' => route('admin.blog.edit', $q->id),
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
