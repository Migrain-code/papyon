<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front-end.welcome.index');
    }

    public function proparties()
    {
        return view('front-end.property.index');
    }

    public function blogs()
    {
        $categories = BlogCategory::whereStatus(1)->get();
        $blogCategory = $categories->first();
        $blogs = $blogCategory->blogs()->paginate(8);
        return view('front-end.blog.index', compact('categories', 'blogCategory', 'blogs'));
    }

    public function blogCategory($slug)
    {
        $categories = BlogCategory::whereStatus(1)->get();
        $blogCategory = BlogCategory::where('slug', $slug)->first();
        $blogs = $blogCategory->blogs()->paginate(8);
        return view('front-end.blog.index', compact('categories', 'blogCategory', 'blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::whereSlug($slug)->whereStatus(1)->firstOrFail();
        $otherBlogs = $blog->category->blogs()->whereNot('id', $blog->id)->latest()->take(5)->get();
        $heads = headers($blog->description);
        $categories = BlogCategory::whereStatus(1)->get();
        return view('front-end.blog.detail.index', compact('blog', 'heads', 'otherBlogs', 'categories'));
    }
    public function faq()
    {
        return view('front-end.faq.index');
    }
    public function entegration()
    {
        return view('front-end.entegration.index');
    }
    public function package()
    {
        return view('front-end.package.index');
    }
    public function partnership()
    {
        $cities = City::all();
        return view('front-end.partnership.index', compact('cities'));
    }

    public function contact()
    {
        return view('front-end.contact.index');
    }
}
