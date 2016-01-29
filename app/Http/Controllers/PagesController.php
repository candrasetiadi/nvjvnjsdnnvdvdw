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

        return view('pages.home');
    }

    public function about() {
        //

        return view('pages.about');
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


    public function propertyListing() {

        // Improvement required for infinity scrolling

        $properties = \App\Property::with(array('propertyFiles' => function($query) {
                $query->where('type', 'image');
            }))
            ->orderBy('updated_at', 'DESC')->paginate(24);

        return view('pages.property-listing', compact('properties'));
    }


    public function propertyView($url) {

        // Improvement required for infinity scrolling

        $slug = explode('-', $url);

        $id = end($slug);

        $property = Property::find($id);


        // return $property;

        return view('pages.property-view', compact('property'));
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
