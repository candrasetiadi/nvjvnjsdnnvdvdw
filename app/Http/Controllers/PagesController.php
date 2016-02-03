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
        $titles = 'About';
        return view('pages.about', compact('titles'));
    }

    public function contact() {
        //
        $titles = 'Contact';
        return view('pages.contact', compact('titles'));
    }

    public function testimony() {
        //
        $titles = 'Testimonial';
        return view('pages.testimony', compact('titles'));
    }

    public function sellProperty() {
        //

        return view('pages.sell-property');
    }

    public function lawyerNotary() {
        //
        $titles = 'Lawyer & Notary';
        return view('pages.lawyer-notary', compact('titles'));
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

        $limit = 24;

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
                ->orderBy('updated_at', 'DESC')->paginate($limit);

        } else {

            $properties = \App\Property::with(array('propertyFiles' => function($query) {
                    $query->where('type', 'image');
                }))
                ->orderBy('updated_at', 'DESC')->paginate($limit);
        }

        $type = \Lang::get('url')[$route];

        if (\Input::get('page') > 1) {

            $html = '';

            foreach ($properties as $property) {

                $html .= '<div class="col-md-4 list-item">
                            <a href="' . route('property.' . $property->category->route, 
                                [
                                    $property->category->route => \Lang::get('url')[$property->category->route],
                                    'property' => str_slug($property->lang()->title) . '-' . $property->id

                                ]) . '">

                                <div class="thumbnail">';

                                    if (count($property->propertyFiles) > 0) {

                                        $html .= '<img src="'. asset('uploads/property/' . $property->propertyFiles[0]->file) .'">';
                                    } else {

                                        $html .= '<img src="'. asset('no-image.png') .'">';
                                    }

                                $html .= '<div class="caption">
                                        <h3 class="list-item-title">'. $property->lang()->title .'</h3>
                                    </div>
                                </div>
                            </a>
                        </div>';

            }
            
            $html .= '<a class="jscroll-next hidden" href="'. $properties->nextPageUrl() .'">next page</a>';

            return $html;

        } else {

            return view('pages.property-listing', compact('properties', 'type'));
        }

    }


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


    public function propertySearch($src, $slug)
    {
        if ( $slug != 'all' ) {
            $slug = explode('-', $slug);
            $type = end($slug);
            $srctype = $slug[ 3 ];
            $titles = ($srctype == '1' || $srctype == '2') ? $slug[ 0 ] .' '. $slug [ 1 ] .' $'. $slug[ 2 ] : $slug[ 0 ] .' '. $slug [ 1 ] .' '. $slug[ 2 ];
        }
        else {
            $type = 'Search';
            $srctype = '';
            $titles = 'All';
        }

        return view('pages.search-property', compact('type', 'titles', 'srctype'));
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
