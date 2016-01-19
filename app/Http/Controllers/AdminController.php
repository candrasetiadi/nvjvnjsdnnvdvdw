<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AnalyticsController;

class AdminController extends Controller {

    public function dashboard() {

        return view('admin.pages.dashboard');
    }



    public function enquiries() {

        return view('admin.pages.enquiries');
    }



    public function customers() {

        return view('admin.pages.customers');
    }



    public function properties() {

        return view('admin.pages.properties');

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



    public function accounts() {

        return view('admin.pages.accounts');

    }



    public function settings() {

        return view('admin.pages.settings');

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
