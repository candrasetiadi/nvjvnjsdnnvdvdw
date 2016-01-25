<?php

function baseUrl() {

    $fallback = Config::get('app.fallback_locale');

    $lang = App::getLocale();

    $locale = ($lang == $fallback ? '' : '/' . $lang);

    return url() . $locale;
}

// 30x 29 x 43
function convertToInches($data) {

    $string = preg_replace('/\s+/', '', $data);

    $string = strtolower($string);

    $numbers = explode('x', $string);

    if(count($numbers) != 3) return 'Invalid size';

    $n = array();

    foreach($numbers as $num) {

        $num = $num * 0.39;

        $n[] = number_format($num, 1);
    }

    return $n[0] . ' x ' . $n[1] . ' x ' . $n[2];
}

function humanize($value) {

    if($value > 1000000000) {

        $head = $value / 1000000000;

        $head = number_format((float)$head, 1, '.', '');

        return $head . 'b';

    } elseif($value > 1000000) {

        $head = $value / 1000000;

        $head = number_format((float)$head, 1, '.', '');

        return $head . 'm';

    } elseif($value > 1000) {

        $head = $value / 1000;

        $head = number_format((float)$head, 1, '.', '');

        return $head . 'k';

    } else {

        return $value;
    }
}


