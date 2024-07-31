<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\City;
use App\Models\ContactRequest;
use App\Models\Contract;
use App\Models\DemoRequest;
use App\Models\Entegration;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Page;
use App\Models\PartnershipRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function temp()
    {
        $menu_kategori = array(
            array('id' => '51','baslik' => 'Izgara','aciklama' => 'Izgara','foto' => '440179880.jpg','sira' => '4','parent' => ''),
            array('id' => '50','baslik' => 'Aperitifler','aciklama' => 'Aperitifler','foto' => '1942976584.jpg','sira' => '3','parent' => ''),
            array('id' => '47','baslik' => 'Palimpsest Special','aciklama' => 'Palimpsest Special','foto' => '686976022.jpg','sira' => '0','parent' => ''),
            array('id' => '48','baslik' => 'Kahvaltı','aciklama' => 'Kahvaltı','foto' => '1302339224.jpg','sira' => '1','parent' => ''),
            array('id' => '49','baslik' => 'Menemen Ve Yumurta','aciklama' => 'Menemen Ve Yumurta','foto' => '539866680.jpg','sira' => '2','parent' => ''),
            array('id' => '52','baslik' => 'Et Menü','aciklama' => 'Et Menü','foto' => '205843499.jpg','sira' => '5','parent' => ''),
            array('id' => '53','baslik' => 'Tavuk Menü','aciklama' => 'Tavuk Menü','foto' => '65818588.jpg','sira' => '6','parent' => ''),
            array('id' => '54','baslik' => 'Hamburgerler','aciklama' => 'Hamburgerler','foto' => '645277243.jpg','sira' => '7','parent' => ''),
            array('id' => '55','baslik' => 'Pizza Çeşitleri','aciklama' => 'Pizza Çeşitleri','foto' => '1102252555.jpg','sira' => '8','parent' => ''),
            array('id' => '56','baslik' => 'Wraplar','aciklama' => 'Wraplar','foto' => '609968990.jpg','sira' => '9','parent' => ''),
            array('id' => '57','baslik' => 'Makarna Menü','aciklama' => 'Makarna Menü','foto' => '1406358251.jpg','sira' => '10','parent' => ''),
            array('id' => '58','baslik' => 'Mantı Çeşitleri','aciklama' => 'Mantı Çeşitleri','foto' => '760530359.jpg','sira' => '11','parent' => ''),
            array('id' => '59','baslik' => 'Salatalar','aciklama' => 'Salatalar','foto' => '2071404835.jpg','sira' => '12','parent' => ''),
            array('id' => '60','baslik' => 'Tost Çeşitleri','aciklama' => 'Tost Çeşitleri','foto' => '790085902.jpg','sira' => '13','parent' => ''),
            array('id' => '61','baslik' => 'Pasta-Tatlı','aciklama' => 'Pasta-Tatlı','foto' => '553397112.jpg','sira' => '14','parent' => ''),
            array('id' => '62','baslik' => 'Sıcak İçecekler','aciklama' => 'Sıcak İçecekler','foto' => '533273536.jpg','sira' => '15','parent' => ''),
            array('id' => '63','baslik' => 'Soğuk İçecekler','aciklama' => 'Soğuk İçecekler','foto' => '1286878076.jpg','sira' => '16','parent' => ''),
            array('id' => '64','baslik' => 'Kokteyl','aciklama' => 'Kokteyl','foto' => '2023121752.jpg','sira' => '17','parent' => ''),
            array('id' => '65','baslik' => 'Meşrubatlar','aciklama' => 'Meşrubatlar','foto' => '1276563422.jpg','sira' => '19','parent' => ''),
            array('id' => '73','baslik' => 'SPECIAL NARGİLELER','aciklama' => 'SPECIAL NARGİLELER','foto' => '1271568202.jpg','sira' => '21','parent' => ''),
            array('id' => '69','baslik' => 'Nargileler','aciklama' => 'Nargileler','foto' => '588006399.jpg','sira' => '20','parent' => ''),
            array('id' => '72','baslik' => 'DONDURMA','aciklama' => 'DONDURMA','foto' => 'adsız.jpg','sira' => '18','parent' => '')
        );

        foreach ($menu_kategori as $category){
            dd($category);

        }
    }
    public function index()
    {
        //$this->temp();
        $packages = Package::all();
        $features = Feature::whereStatus(1)->latest()->take(4)->get();
        $blogs = Blog::whereStatus(1)->latest()->take(5)->get();

        return view('front-end.welcome.index', compact('packages', 'features', 'blogs'));
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

    public function pageDetail($slug)
    {
        $page = Page::whereSlug($slug)->first();
        return view('front-end.page.index', compact('page'));
    }
    public function entegration()
    {
        $images = Gallery::where('status', 1)->latest()->take(10)->get();
        $entegrations = Entegration::whereStatus(1)->get();
        return view('front-end.entegration.index', compact('images', 'entegrations'));
    }
    public function package()
    {
        $packages = Package::all();
        return view('front-end.package.index', compact('packages'));
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

    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'subject' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'subject' => "Konu",
        ]);
        $contact = new ContactRequest();
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        if ($contact->save()){
            return back()->with('response', [
                'status' => "success",
                'message' => "Talebiniz Tarafımıza iletildi en kısa sürede sizinle iletişime geçeceğiz"
            ]);
        }
    }

    public function demoRequest(Request $request)
    {
        $request->validate([
            'name' => "required",
            'mail' => "required",
            'phone' => "required",
            'company_name' => "required",
        ], [], [
            'name' => "Ad Soyad",
            'mail' => "E-posta",
            'phone' => "Telefon",
            'company_name' => "Şirket Adı",
        ]);
        $contact = new DemoRequest();
        $contact->name = $request->input('name');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->company_name = $request->input('company_name');
        $contact->note = $request->input('message');
        if ($contact->save()){
            return to_route('front.index')->with('response', [
                'status' => "success",
                'message' => "Talebiniz Tarafımıza iletildi en kısa sürede sizinle iletişime geçeceğiz"
            ]);
        }
    }
}
