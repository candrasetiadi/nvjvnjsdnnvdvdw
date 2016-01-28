<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AnalyticsController;

class AdminController extends Controller {

    private $limit = 20;
    private $lang = '';

    public function __construct()
    {
        $this->lang = \Lang::getLocale();
    }

    public function dashboard() {

        return view('admin.pages.dashboard');
    }



    public function inquiries() {

        return view('admin.pages.enquiries');
    }



    public function customers() {

        $search = \Input::get('q');

        if ($search) {
            $customers = \App\Customer::where('firstname', 'like', $search . '%')->orWhere('lastname', 'like', $search . '%')->orderBy('created_at', 'desc')->paginate($this->limit);
        } else {
            $customers = \App\Customer::orderBy('created_at', 'desc')->paginate($this->limit);
        }

        return view('admin.pages.customers', compact('customers'));
    }



    public function properties() {

        $search = \Input::get('q');

        if ($search) {

            $properties = \App\Property::select('Properties.*')
                ->join('PropertyLanguages', 'PropertyLanguages.property_id', '=', 'Properties.id')
                ->where('PropertyLanguages.locale', $this->lang)
                ->where('PropertyLanguages.title', 'like', $search . '%')
                ->orderBy('Properties.created_at', 'desc')->paginate($this->limit);

        } else {

            $properties = \App\Property::orderBy('created_at', 'desc')->paginate($this->limit);
        }

        $categories = \App\Category::orderBy('order', 'asc')->get();

        return view('admin.pages.properties', compact('properties', 'categories'));

    }


    public function enquiries() {

        $search = \Input::get('q');

        $enquiries = \App\Inquiry::orderBy('created_at', 'desc')->paginate($this->limit);

        return view('admin.pages.enquiries', compact('enquiries'));

    }


    public function propertyCategories()
    {

        $search = \Input::get('q');

        if ($search) {

            $categories = \App\Category::select('Categories.*')
                ->join('CategoryLanguages', 'CategoryLanguages.property_id', '=', 'Categories.id')
                ->where('CategoryLanguages.locale', $this->lang)
                ->where('CategoryLanguages.title', 'like', $search . '%')
                ->orderBy('Categories.created_at', 'desc')->paginate($this->limit);

        } else {

            $categories = \App\Category::orderBy('order', 'asc')->paginate($this->limit);
        }

        return view('admin.pages.categories', compact('categories'));

    }



    public function blog() {

        return view('admin.pages.blog');

    }



    public function blogCategories() {

        return view('admin.pages.blog-categories');

    }



    public function blogComments() {

        return view('admin.pages.blog-comments');

    }



    public function blogSettings() {

        return view('admin.pages.blog-settings');

    }



    public function myAccount() {

        $user = \Auth::user()->get();

        return view('admin.pages.my-account', compact('user'));

    }



    public function accounts() {

        $accounts = User::all();

        return view('admin.pages.accounts', ['accounts' => $accounts]);

    }



    public function settings() {

        $autoCurrency = file_exists(storage_path('config/autocurrency.flag'));

        return view('admin.pages.settings', ['autoCurrency' => $autoCurrency]);
    }



    public function index() {

        return view('admin.pages.index');

    }



    public function currency() {

        return view('admin.pages.currency');

    }



    public function notifications() {

        return view('admin.pages.notifications');

    }



    public function io() {

        return view('admin.pages.io');

    }



    public function about() {

        return view('admin.pages.about');

    }



}
