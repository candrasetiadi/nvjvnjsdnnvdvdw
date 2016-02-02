<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Property;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(Request $request) {

        $currency = $request->session()->get('currency', 'usd');

        \Config::set('currency', $currency);
    }

    public function home() {
        //

        return view('pages.home_old');
    }

    public function about() {
        //

        return view('pages.about');
    }

    public function contact() {
        //

        return view('pages.contact');
    }

    public function testimony() {
        //

        return view('pages.testimony');
    }

    public function sellProperty() {
        //

        return view('pages.sell-property');
    }

    public function lawyerNotary() {
        //

        return view('pages.lawyer-notary');
    }

    public function login() {
        //
        if (\Auth::customer()->check()) return redirect('account');

        return view('pages.login');
    }

    public function account() {
        //

        return view('pages.account');
    }

    public function accountWishlist() {
        //

        return view('pages.account-wishlist');
    }

    public function accountSetting() {
        //

        return view('pages.account-setting');
    }


    public function propertyListing($cat) {
        
        // Improvement required for infinity scrolling
        foreach(\Lang::get('url') as $k => $v) {

            if ($v == $cat) {
                $route = $k;
                break;
            }
        }

        $category = \App\Category::where('route', $route)->first();

        if ($category) {

            $properties = \App\Property::with(array('propertyFiles' => function($query) {
                    $query->where('type', 'image');
                }))
                ->where('category_id', $category->id)
                ->orderBy('updated_at', 'DESC')->paginate(24);

        } else {

            $properties = \App\Property::with(array('propertyFiles' => function($query) {
                    $query->where('type', 'image');
                }))
                ->orderBy('updated_at', 'DESC')->paginate(24);
        }

        return view('pages.property-listing', compact('properties'));
    }


    // public function propertyCategoryListing($url) {

    //     $slug = str_replace('-', ' ', $url);

    //     $category = \App\CategoryLanguage::where('locale', 'en')->where('title', $slug)->first();

    //     $properties = \App\Property::with(array('propertyFiles' => function($query) {
    //             $query->where('type', 'image');
    //         }))
    //         ->where('category_id', $category->id)
    //         ->orderBy('updated_at', 'DESC')->paginate(24);

    //     return view('pages.property-listing', compact('properties'));
    // }


    public function propertyView($category, $slug) {

        // Improvement required for infinity scrolling

        foreach(\Lang::get('url') as $k => $v) {

            if ($v == $category) {
                $route = $k;
                break;
            }
        }

        $slug = explode('-', $slug);

        $id = end($slug);

        $property = Property::find($id);

        if ($property->category->route != $route) return redirect(\Config::get('app.locale_prefix') . '/' . \Lang::get('url')[$route]);

        return view('pages.property-view', compact('property'));
    }


    public function propertySearch()
    {
        return view('pages.search-property');
    }

    public function lawyerPage()
    {

        return 'LAWYER';
    }


    public function blogListing() {
        //
        $blogs = Blog::orderBy('id', 'DESC')->get();

        return view('pages.blog-listing', ['blogs' => $blogs]);
    }


    public function blogView($url) {
        //
        $blog = Blog::where('url', $url)->first();

        return view('pages.blog-view', ['blog' => $blog]);
    }
}
