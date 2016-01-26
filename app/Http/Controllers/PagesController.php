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

        $properties = Property::orderBy('id', 'DESC')->take(24)->get();

        return view('pages.property-listing', ['properties' => $properties]);
    }


    public function propertyView($id) {

        // Improvement required for infinity scrolling

        $property = Property::find($id);

        return view('pages.property-view', ['properties' => $properties]);
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
