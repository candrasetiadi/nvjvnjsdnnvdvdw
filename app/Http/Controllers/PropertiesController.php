<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Property;

use DB;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function test()
    {
        //
        $prop = Property::find(1);

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'post success', 'message' => 'Post has been received'), 'data' => $prop));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // To do change user_id value with logged in user

        if ($request->edit != 0) return $this->update($request, $request->edit);

        DB::beginTransaction();

        $user_id = \Auth::user()->get()->id;

        $property = new Property;

        $property->user_id = $user_id;

        // $property->customer_id = $request->customer_id;
        $property->category_id = $request->category_id;

        $property->currency = $request->currency;
        $property->price = $request->price;
        // $property->discount = $request->discount;
        $property->type = $request->type;

        // $property->publish = $request->publish;
        $property->building_size = $request->building_size;
        $property->land_size = $request->land_size;

        // $property->sold = $request->sold;
        $property->code = $request->code;
        $property->status = $request->status;
        $property->year = $request->year;

        // $property->map_latitude = $request->map_latitude;
        // $property->map_longitude = $request->map_longitude;

        $property->city = $request->city;
        $property->province = $request->province;
        $property->country = $request->country;

        $property->slug = $request->slug;
        // $property->view = $request->view;

        $property->view_north = $request->view_north;
        $property->view_east = $request->view_east;
        $property->view_west = $request->view_west;
        $property->view_south = $request->view_south;

        $property->is_price_request = $request->is_price_request;
        $property->is_exclusive = $request->is_exclusive;

        $property->owner_name = $request->owner_name;
        $property->owner_email = $request->owner_email;
        $property->owner_phone = $request->owner_phone;

        $property->agent_commission = $request->agent_commission;
        $property->agent_contact = $request->agent_contact;
        $property->agent_meet_date = $request->agent_meet_date;
        $property->agent_inspector = $request->agent_inspector;

        $property->sell_reason = $request->sell_reason;
        $property->sell_note = $request->sell_note;
        $property->other_agent = $request->other_agent;

        // $property->display = $request->display;
        $property->orientation = $request->orientation;
        $property->sell_in_furnish = $request->sell_in_furnish;
        $property->lease_period = $request->lease_period;
        $property->lease_year = $request->lease_year;

        $property->save();


        Model::unguard();

        // lang
        $property->propertyLanguages()->save(

            new \App\PropertyLanguage([
                'locale' => 'en',
                'title' => $request->title,
                'description' => $request->description
            ])

        );

        // distances
        if ($request->distance_value) {
            foreach ($request->distance_value as $key => $value) {

                $distance = new \App\Distance;

                $distance->property_id = $property->id;
                $distance->from = $key;
                $distance->value = $value;
                $distance->unit = $request->distance_unit[$key];

                $distance->save();
            }
        }

        // documents
        if ($request->documents) {
            foreach ($request->documents as $key => $value) {

                $document = new \App\Document;

                $document->property_id = $property->id;
                $document->name = $key;
                $document->is_included = $value;

                $document->save();
            }
        }

        // facilities
        if ($request->facilities) {
            foreach ($request->facilities as $key => $value) {

                $facility = new \App\Facility;

                $facility->property_id = $property->id;
                $facility->name = $key;
                $facility->description = $value;

                $facility->save();
            }
        }

        // files
        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $key => $value) {

                $destinationPath = 'uploads/property';

                $extension = $value->getClientOriginalExtension();
                $fileName = date('YmdHis') . '_' . $key . '_kibarer_property' . '.' . $extension;

                $value->move($destinationPath, $fileName);

                $propertyFile = new \App\PropertyFile;

                $propertyFile->property_id = $property->id;
                $propertyFile->file = $fileName;

                $propertyFile->save();

            }

        }

        Model::reguard();

        DB::commit();

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'post success', 'message' => 'Post has been received')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $property = Property::find($id);

        $property->propertyLanguages = $property->propertyLanguages()->where('locale', 'en')->first();

        $property->facility = $property->facilities()->get();

        $property->distance = $property->distances()->get();

        $property->gallery = $property->propertyFiles()->where('type', 'image')->get();

        return $property;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        DB::beginTransaction();

        $user_id = \Auth::user()->get()->id;

        $property = Property::find($id);

        $property->user_id = $user_id;

        // $property->customer_id = $request->customer_id;
        $property->category_id = $request->category_id;

        $property->currency = $request->currency;
        $property->price = $request->price;
        // $property->discount = $request->discount;
        $property->type = $request->type;

        // $property->publish = $request->publish;
        $property->building_size = $request->building_size;
        $property->land_size = $request->land_size;

        // $property->sold = $request->sold;
        $property->code = $request->code;
        $property->status = $request->status;
        $property->year = $request->year;

        // $property->map_latitude = $request->map_latitude;
        // $property->map_longitude = $request->map_longitude;

        $property->city = $request->city;
        $property->province = $request->province;
        $property->country = $request->country;

        $property->slug = $request->slug;
        // $property->view = $request->view;

        $property->view_north = $request->view_north;
        $property->view_east = $request->view_east;
        $property->view_west = $request->view_west;
        $property->view_south = $request->view_south;

        $property->is_price_request = $request->is_price_request;
        $property->is_exclusive = $request->is_exclusive;

        $property->owner_name = $request->owner_name;
        $property->owner_email = $request->owner_email;
        $property->owner_phone = $request->owner_phone;

        $property->agent_commission = $request->agent_commission;
        $property->agent_contact = $request->agent_contact;
        $property->agent_meet_date = $request->agent_meet_date;
        $property->agent_inspector = $request->agent_inspector;

        $property->sell_reason = $request->sell_reason;
        $property->sell_note = $request->sell_note;
        $property->other_agent = $request->other_agent;

        // $property->display = $request->display;
        $property->orientation = $request->orientation;
        $property->sell_in_furnish = $request->sell_in_furnish;
        $property->lease_period = $request->lease_period;
        $property->lease_year = $request->lease_year;

        $property->save();


        Model::unguard();

        // lang
        $language = $property->propertyLanguages()->where('locale', 'en')->first();

        $language->title = $request->title;
        $language->description = $request->description;

        $language->save();

        // distances
        if ($request->distance_value) {
            
            foreach ($request->distance_value as $key => $value) {

                $distance = \App\Distance::find($request->distance_id[$key]);

                $distance->from = $key;
                $distance->value = $value;
                $distance->unit = $request->distance_unit[$key];

                $distance->save();
            }
        }

        // documents
        // if ($request->documents) {
        //     foreach ($request->documents as $key => $value) {

        //         $document = new \App\Document;

        //         $document->property_id = $property->id;
        //         $document->name = $key;
        //         $document->is_included = $value;

        //         $document->save();
        //     }
        // }

        // facilities
        if ($request->facilities) {
            foreach ($request->facilities as $key => $value) {

                $facility = \App\Facility::find($request->facility_id[$key]);

                $facility->name = $key;
                $facility->description = $value;

                $facility->save();
            }
        }

        // files
        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $key => $value) {

                $destinationPath = 'uploads/property';

                $extension = $value->getClientOriginalExtension();
                $fileName = date('YmdHis') . '_' . $key . '_kibarer_property' . '.' . $extension;

                $value->move($destinationPath, $fileName);

                $propertyFile = new \App\PropertyFile;

                $propertyFile->property_id = $property->id;
                $propertyFile->file = $fileName;

                $propertyFile->save();

            }

        }

        Model::reguard();

        DB::commit();

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'update success', 'message' => 'Property has been updated')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $property = Property::find($id);

        $property->delete();

        // $property->softDeletes();
        // return redirect()->back();
        return response()->json(array('status' => 200, 'monolog' => array('title' => 'delete success', 'message' => 'Property has been deleted'), 'id' => $id));
    }


    public function destroyImage($id)
    {
        //
        $propertyFile = \App\PropertyFile::find($id);

        unlink(public_path('uploads/property/') . $propertyFile->file);

        $propertyFile->delete();

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'delete success', 'message' => 'Property has been deleted'), 'id' => $id));
    }


    public function getTranslate($id)
    {

        $enLang = \App\PropertyLanguage::where('property_id', $id)->where('locale', 'en')->first();

        $idLang = \App\PropertyLanguage::where('property_id', $id)->where('locale', 'id')->first();

        $frLang = \App\PropertyLanguage::where('property_id', $id)->where('locale', 'fr')->first();

        $ruLang = \App\PropertyLanguage::where('property_id', $id)->where('locale', 'ru')->first();

        return response()->json(['en' => $enLang, 'id' => $idLang, 'fr' => $frLang, 'ru' => $ruLang]);
    }


    public function storeTranslate(Request $request)
    {
        DB::beginTransaction();

        foreach ($request->title as $key => $title) {

            $propertyLang = \App\PropertyLanguage::where('property_id', $request->edit_translate)->where('locale', $key)->first();

            if ($propertyLang) {

                $propertyLang->title = $title ? $title : '' ;
                $propertyLang->description = $request->description[$key] ? $request->description[$key] : '' ;

                $propertyLang->save();

            } else {

                $propertyLang = new \App\propertyLanguage;

                if ($title) $propertyLang->title = $title;
                if ($request->description[$key]) $propertyLang->description = $request->description[$key];

                if ($title || $request->description[$key]) {

                    $propertyLang->locale = $key;
                    $propertyLang->property_id = $request->edit_translate;

                    $propertyLang->save();
                }
                
            }

        }

        DB::commit();

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'update translation success', 'message' => 'Translation has been updated')));
    }


}
