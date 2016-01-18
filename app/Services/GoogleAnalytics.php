<?php namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GoogleAnalytics {

    protected $client;

    protected $service;

    function __construct() {
        /* Get config variables */
        $client_id = Config::get('google.client_id');

        $service_account_name = Config::get('google.service_account_name');

        $key_file_location = base_path() . Config::get('google.key_file_location');

        $this->client = new \Google_Client();

        $this->client->setApplicationName("Kesato Manager");

        //$this->client->setScopes('https://www.googleapis.com/auth/analytics');

        $this->service = new \Google_Service_Analytics($this->client);

        /* If we have an access token */
        if (Cache::has('service_token')) {

            $this->client->setAccessToken(Cache::get('service_token'));
        }

        $key = file_get_contents($key_file_location);

        /* Add the scopes you need */
        $scopes = array('https://www.googleapis.com/auth/analytics');

        $cred = new \Google_Auth_AssertionCredentials(
            $service_account_name,
            $scopes,
            $key
            );

        $this->client->setAssertionCredentials($cred);

        if ($this->client->getAuth()->isAccessTokenExpired()) {
            $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }

        Cache::forever('service_token', $this->client->getAccessToken());
    }

    public function getAll($profileId, $metric = 'pageViews', $from = '13daysAgo', $until = 'today') {

        //return array('views' => array(1, 3, 2, 5, 3, 7, 1, 3), 'devices' => array('desktop' => 23, 'mobile' => 12), 'countries' => array('france' => 3, 'germany' => 4));

        $pageViews = $this->getData($profileId, $metric, $from, $until, 'date');

        $viewsArray = array();

        foreach($pageViews['rows'] as $date => $views) {

            $viewsArray[] = (int) $views[1];
        }

        $devices = $this->getData($profileId, $metric, $from, $until, 'deviceCategory');

        $devicesArray = array();

        foreach($devices['rows'] as $d => $device) {

            $devicesArray[$device[0]] = $device[1];
        }

        $countries = $this->getData($profileId, $metric, $from, $until, 'country');

        $countriesArray = array();

        foreach($countries['rows'] as $d => $country) {

            $countriesArray[$country[0]] = $country[1];
        }

        $bounceRate = $this->getData($profileId, 'bounceRate', $from, $until);

        $sessionDuration = $this->getData($profileId, 'avgSessionDuration', $from, $until);

        $pagesPerSession = $this->getData($profileId, 'pageviewsPerSession', $from, $until);

        $newUsers = $this->getData($profileId, 'newUsers', $from, $until);

        $todayVisits = $this->getData($profileId, 'pageViews', 'today', 'today');

        return array('views' => $viewsArray, 'devices' => $devicesArray, 'countries' => $countriesArray, 'complete' => array('views' => $pageViews, 'devices' => $devices, 'countries' => $countries, 'bounceRate' => $bounceRate, 'sessionDuration' => $sessionDuration, 'pagesPerSession' => $pagesPerSession, 'newUsers' => $newUsers, 'todayViews' => $todayVisits));
    }

    public function getData($profileId, $metric, $from, $until, $dimension = 'date') {
        // Calls the Core Reporting API and queries for the number of sessions
        // for the last 14 days.
        return $this->service->data_ga->get(
            'ga:' . $profileId,
            $from,
            $until,
            'ga:' . $metric,
            array('dimensions' => 'ga:' . $dimension)
        );
    }
}
