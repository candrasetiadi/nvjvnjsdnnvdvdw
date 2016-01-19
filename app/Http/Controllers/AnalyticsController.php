<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use App\User;
use App\Http\Requests;
use App\Services\GoogleAnalytics;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class AnalyticsController extends Controller {

    public function __construct() {

        $this->id = Config::get('google.profile_id');

        $this->analytics = new GoogleAnalytics;
    }

    // Get data for the last two weeks by default
    public function getData(Request $request) {

        $metric = $request->input('metric', 'pageViews');

        $from = $request->input('from', '19daysAgo');

        $until = $request->input('until', 'today');

        $completeData = $this->analytics->getAll($this->id, $metric, $from, $until);

        return response()->json(array('status' => 200, 'data' => $completeData));
    }

    // Get data for the last two weeks by default
    public function getA() {

        $metric = 'pageViews';

        $from = '19daysAgo';

        $until = 'today';

        $completeData = $this->analytics->getAll($this->id, $metric, $from, $until);

        return response()->json(array('status' => 200, 'data' => $completeData));
    }
}
