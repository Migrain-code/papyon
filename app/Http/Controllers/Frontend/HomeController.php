<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\City;
use App\Models\Entegration;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\PartnershipRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front-end.welcome.index');
    }

    public function features()
    {
        $features = Feature::whereStatus(1)->latest()->paginate(8);
        return view('front-end.property.index', compact('features'));
    }
    public function featureDetail($slug)
    {
        $feature = Feature::whereStatus(1)->whereSlug($slug)->first();
        $heads = headers($feature->description);
        $otherFeatures = Feature::whereNot('id', $feature->id)->whereStatus(1)->latest()->take(5)->get();
        return view('front-end.property.detail.index', compact('feature', 'heads', 'otherFeatures'));
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
        $images = Gallery::where('status', 1)->latest()->take(10)->get();
        $entegrations = Entegration::whereStatus(1)->get();
        return view('front-end.entegration.index', compact('images', 'entegrations'));
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
    public function partnershipForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company_age' => 'required',
            'city_id' => 'required',
            'customer_count' => 'required',
            'target_customer_count' => 'required',
            'terms' => 'accepted',
        ], [], [
            'name' => "Ad Soyad",
            'phone' => "Telefon",
            'email' => "E-posta",
            'company_age' => "Şirket Yaşı",
            'city_id' => "Şehir",
            'customer_count' => "Müşteri Sayısı",
            'target_customer_count' => "Hedef Müşteri Sayısı",
            'terms' => "Gizlilik Politikası"
        ]);
        $partnerShipRequest = new PartnershipRequest();
        $partnerShipRequest->name = $request->input('name');
        $partnerShipRequest->phone = $request->input('phone');
        $partnerShipRequest->email = $request->input('email');
        $partnerShipRequest->company_age = $request->input('company_age');
        $partnerShipRequest->city_id = $request->input('city_id');
        $partnerShipRequest->customer_count = $request->input('customer_count');
        $partnerShipRequest->goal_customer_count = $request->input('target_customer_count');
        $partnerShipRequest->other_company = $request->input('other_companies');
        $partnerShipRequest->note = $request->input('note');
        if($partnerShipRequest->save()){
            return back()->with('response', [
               'status' => "success",
               'message' => "Talebiniz Tarafımıza iletildi en kısa sürede sizinle iletişime geçeceğiz"
            ]);
        }
    }
    public function contact()
    {
        return view('front-end.contact.index');
    }
}
