<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use File;
use Config;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemController extends Controller {



    public function reindexData() {
        //
    }




    public function getExchange() {

        $currencies = File::get(storage_path('json/conversion.json'));

        return $currencies;
    }



    // Automatically update the exchange rate
    public function updateExchange() {

        $baseCurrency = Config::get('currencies.base_currency');

        $altCurrencies = Config::get('currencies.alt_currencies');

        $conversion = array();

        foreach($altCurrencies as $c) {

            $exchange = file_get_contents("https://currency-api.appspot.com/api/$baseCurrency/$c.json");

            $exObj = json_decode($exchange);

            $conversion[$c] = $exObj->rate;
        }

        File::put(storage_path('json/conversion.json'), json_encode($conversion));

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'exchange rates updated', 'message' => 'The conversion rates have been updated successfully')));
    }



    // Set the exchange rate manually
    public function setExchange() {

        $curr = Input::get('currencies');

        $conversion = array();

        foreach($curr as $k => $c) {

            $conversion[$k] = $c;
        }

        File::put(storage_path('json/conversion.json'), json_encode($conversion));

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'exchange rates updated', 'message' => 'The conversion rates have been updated successfully')));
    }




    public function setExchangeAuto($state) {

        if($state) {

            File::put(storage_path('config/autocurrency.flag'), '');

            return response()->json(array('status' => 200, 'monolog' => array('title' => 'automatic update on', 'message' => 'Conversion rates will be updated daily')));

        } else {

            File::delete(storage_path('config/autocurrency.flag'));

            return response()->json(array('status' => 200, 'monolog' => array('title' => 'automatic update off', 'message' => 'Conversion rates will not be updated daily')));
        }
    }
}
