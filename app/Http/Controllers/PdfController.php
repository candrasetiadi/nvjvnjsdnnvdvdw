<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller {





    // Sample PDF Download
    public function test(Request $request) {

        $property = Property::find($request->prop);

        $property->language = $property->propertyLanguages()->where('locale', 'en')->first();

//        $property->thumbnails = $property->

        $pdf = \PDF::loadView('pdf.property', ['property' => $property]);

        return $pdf->stream('invoice.pdf');
    }
}
