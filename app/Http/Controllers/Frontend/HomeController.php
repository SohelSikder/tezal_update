<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Advertise;
use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\CompanyStory;
use App\Models\Admin\ImageGallery;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use App\Models\Admin\Story;
use App\Models\Admin\Testimonial;
use App\Models\Banner;
use App\Models\Currency;
use App\Models\Language;
use App\Models\SeoSetting;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public  function index()
    {
        if (file_exists(storage_path('installed'))) {
            if (!Session::has('currency')) {
                Session::put('currency', Setting::where('slug', 'default_currency')->first()->value ?? 'USD');
            }
            $data['stories'] = Story::where('status', 1)->latest()->get();
            
            $data['sliders'] = Slider::latest()->get();
            $data['banner'] = Banner::first();
            $data['promotion'] = Advertise::latest()->get();
            $data['blogs'] = Blog::with('tags')->latest()->get();
            $data['brands'] = Brand::latest()->get();
            $data['story'] = CompanyStory::latest()->get();
            $all_products = Product::with('brand', 'category', 'colors', 'sizes', 'product_tags')->latest();
            $data['products'] = $all_products->paginate(allsetting('home_products_page'));
            $data['new_arrivals'] = $all_products->where('New_Arrival', 1)->latest()->paginate(allsetting('home_trending_page'));
            $data['best_sellings'] = Product::where('Best_Selling', 1)->where('status', 1)->latest()->paginate(allsetting('home_trending_page'));
            // $data['on_sales'] = $all_products->where('On_Sale', ACTIVE)->paginate(allsetting('home_trending_page'));
            $data['on_sales'] = Product::where('On_Sale', 1)->latest()->paginate(allsetting('home_trending_page'));
            $data['featured_products'] = $all_products->where('Featured_Product', ACTIVE)->paginate(allsetting('home_trending_page'));
            $data['testimonial'] = Testimonial::get();
            $seo = SeoSetting::where('slug', 'home')->first();
            $data['title'] = $seo->title;
            $data['description'] = $seo->description;
            $data['keywords'] = $seo->keywords;
            $data['active_caetgory_products_into_home'] = Category::where('is_home_page_product', 1)->orderBy('position', 'ASC')->get(['id', 'en_Category_Name']);
            
            // dd($data);
            return view('front.index', $data);
        } else {
            return redirect()->to('/install');
        }
    }
    public function theme_set(Request $request)
    {
        if (env('APP_DEMO') == true) {
            session(['theme' => $request->theme]);
        }
        return redirect()->route('front');
    }
    public function localeSwitch($locale)
    {
        // $lang = Language::where('locale', $locale)->first();
        session(['APP_LOCALE' => $locale]);
        App::setLocale($locale);
        session()->put('locale', $locale);
        app()->setLocale($locale);
        return redirect()->back();
    }
    public function currencySwitch($currency)
    {
        Session::put('currency', $currency);
        return redirect()->back();
    }
    
    public function subCategoryView(){
        dd('ok');
    }
    
   public function submitLocation(Request $request){
       return ($request);
   }
    
}
