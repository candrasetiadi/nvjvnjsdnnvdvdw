<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\GoogleAnalytics;

class DashboardController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $user = Auth::user();

        return view('admin.page.dashboard', ['user' => $user]);
    }

    public function getData(Request $request) {

        $from = $request->input('from', 'today');

        $until = $request->input('from', '13daysAgo');

        $accountId = '96003052';

        $analytics = new GoogleAnalytics;

        $result = $analytics->getResults($accountId, $from, $until);

        $viewsArray = array();

        foreach($result['rows'] as $date => $views) {

            $viewsArray[] = (int) $views[1];
        }

        return array('status' => 200, 'views' => $viewsArray);
    }
}
