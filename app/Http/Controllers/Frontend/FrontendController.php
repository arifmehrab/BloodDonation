<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\adsense;
use App\Models\bloodrequest;
use App\Models\bloodsummary;
use App\Models\category;
use App\Models\district;
use App\Models\divition;
use App\Models\homesettingone;
use App\Models\home_title_setting;
use App\Models\ourteam;
use App\Models\photogallery;
use App\Models\seosetting;
use App\Models\subscriber;
use App\Models\upazila;
use App\User;
use App\Models\post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Session;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Front Page
    public function index()
    {
        // Seo Meta
        $seo = seosetting::first();
        SEOMeta::setTitle($seo->meta_title);
        SEOMeta::setDescription($seo->meta_description);

        OpenGraph::setDescription($seo->meta_description);
        OpenGraph::setTitle($seo->meta_title);
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'articles');

        // blood Donar Count
        $total_donar = User::all()->count();
        $blood_o_p = User::where('blood_group', 'O+')->count();
        $blood_o_N = User::where('blood_group', 'O-')->count();
        $blood_A_p = User::where('blood_group', 'A+')->count();
        $blood_A_N = User::where('blood_group', 'A-')->count();
        $blood_B_p = User::where('blood_group', 'B+')->count();
        $blood_B_N = User::where('blood_group', 'B-')->count();
        $blood_AB_p = User::where('blood_group', 'AB+')->count();
        $blood_AB_N = User::where('blood_group', 'AB-')->count();
        // Divitions
        $divitions = divition::all();
        $users     = User::orderBy('id', 'DESC')->paginate(4);
        // Home settings
        $homeSettingOne   = homesettingone::first();
        $homeTitleSetting = home_title_setting::first();
        $photo_gallery    = photogallery::select('photo_gallery')->orderBy('id', 'DESC')->get();
        // Post
        $posts = post::where('status', 1)->latest()->take(3)->get();
        return view('Frontend.index', compact('divitions', 'users', 'homeSettingOne', 'homeTitleSetting', 'photo_gallery', 'posts', 'total_donar', 'blood_o_p', 'blood_o_N', 'blood_A_p', 'blood_A_N', 'blood_B_p', 'blood_B_N', 'blood_AB_p', 'blood_AB_N'));
    }
    // About Us ======================
    public function aboutUs()
    {
        $ourteam = ourteam::all();
        $about_content = bloodsummary::select('about_content')->first();
        return view('Frontend.pages.about_us', compact('ourteam', 'about_content'));
    }
    // Blood Summary Page ==============
    public function bloodSummary()
    {
        $blood_summary = bloodsummary::first();
        return view('Frontend.pages.blood_summary', compact('blood_summary'));
    }
    // posts Page ====================
    public function posts()
    {
        // Seo Meta
        $seo = seosetting::first();
        SEOMeta::setTitle($seo->meta_title);
        SEOMeta::setDescription($seo->meta_description);

        OpenGraph::setDescription($seo->meta_description);
        OpenGraph::setTitle($seo->meta_title);
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'articles');
        // categories
        $categories = category::all();
        // Posts
        $posts = post::where('status', 1)->latest()->paginate(5);
        $related_post = post::where('status', 1)->latest()->take(5)->get();

        return view('Frontend.pages.posts', compact('posts', 'categories', 'related_post'));
    }
    // Post Details ===================
    public function postView($slug)
    {
        // single post
        $postDetails = post::where('slug', $slug)->where('status', 1)->first();
        // Categories
        $catPost = $postDetails->categories()->where('status', 1)->get();
        $categories = category::all();
        // Latest Post 
        $latest_post = post::where('status', 1)->latest()->take(5)->get();
        // Related Post 
        $related_post = post::inRandomOrder()->limit(5)->get();
        // View count
        $postkey = 'postkey_'.$postDetails->id;
        if(!Session::has($postkey)) {
            $postDetails->increment('view_count');
            Session::put($postkey, 1);
        }
        // Seo Meta
        SEOMeta::setTitle($postDetails->title);
        SEOMeta::setDescription($postDetails->body);
        SEOMeta::addMeta('article:published_time', $postDetails->date, 'property');
        foreach($catPost as $cpost) {
        SEOMeta::addMeta('article:section', $cpost->category_name, 'property');
        }
        SEOMeta::addKeyword($postDetails->tags);

        OpenGraph::setDescription($postDetails->body);
        OpenGraph::setTitle($postDetails->title);
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
        // view
       return view('Frontend.pages.post_details', compact('postDetails', 'categories', 'catPost', 'latest_post', 'related_post'));
    }
    // Terms of Service Page
    public function termsOfService()
    {
        $terms_of_service = adsense::select('terms_of_service')->first();
        return view('Frontend.pages.terms_of_service', compact('terms_of_service'));
    }
    // Privacy Policy
    public function privacyPolicy()
    {
        $privacy_policy = adsense::select('privacy_policy')->first();
        return view('Frontend.pages.privacy_policy', compact('privacy_policy'));
    }
    // DMCA / Copyrights Disclaimer
    public function copyRightDisclaimar()
    {
        $copywright_dsc = adsense::select('copywright_disclaimar')->first();
        return view('Frontend.pages.copywright_disclaimar', compact('copywright_dsc'));
    }
    // Donartion Pages ==============
    public function donation()
    {
        return view('Frontend.pages.donation');
    }
    // Category wais post ==============
    public function categoryPost($slug)
    {
        $categories = category::all();
        $related_post = post::where('status', 1)->latest()->take(5)->get();
        $category = category::where('category_slug', $slug)->where('status', 1)->first();
        $catPost = $category->posts()->where('status', 1)->latest()->paginate(10);
        return view('Frontend.pages.category_post', compact('category', 'catPost', 'categories', 'related_post'));
    }
    // Post Search =====================
    public function postSearch(Request $request)
    {
        $categories = category::all();
        $related_post = post::where('status', 1)->latest()->take(5)->get();
        $searchValue = $request->search;
        $searchResuit = post::where('title','LIKE', "%$searchValue%")->where('status', 1)->get();
        return view('Frontend.pages.post_search_resuit', compact('searchValue', 'searchResuit', 'categories', 'related_post'));

    }
    // Show Destrict By ajax in Resister Form ============
    public function showDestrict(Request $request)
    {
        $divitionId = $request->divition_id;
        $district   = district::where('divition_id', $divitionId)->get();
        return response()->json($district);
    }
    // show Upazila By Ajax In Register Form =============
    public function showUpazila(Request $request)
    {
        $district_id = $request->district_id;
        $upazila = upazila::where('district_id', $district_id)->get();
        return response()->json($upazila);
    }
    // Subscriber Store =================
    public function subscriber(Request $request)
    {
        $subscriber        = new subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        // Notification
        $notification = array(
            'message'    => 'Subscribe Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Blood Request =================
    public function bloodRequestStore(Request $request)
    {
        // validate
        $request->validate([
            'name'         => 'required',
            'blood_group'  => 'required',
            'phone_number' => 'required',
            'address'      => 'required',
            'date'         => 'required',
            'time'         => 'required',
        ]);
        // Insert Date
        $request_blood               = new bloodrequest();
        $request_blood->name         = $request->name;
        $request_blood->blood_group  = $request->blood_group;
        $request_blood->phone_number = $request->phone_number;
        $request_blood->address      = $request->address;
        $request_blood->date         = $request->date;
        $request_blood->time         = $request->time;
        $request_blood->message      = $request->message;
        $request_blood->status       = '0';
        $request_blood->save();
        // Notification
        $notification = array(
            'message'    => 'Request Submit Successfully! We contact soon',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Bangla Language ==================
    public function banglaLanguage()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'bangla');
        return redirect()->back();
    }
    // English Language ===================
    public function englishLanguage()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }
}
