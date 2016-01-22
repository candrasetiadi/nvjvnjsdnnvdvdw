<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Property;

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
        $user_id = 1;

        $property = new Property;

        $property->user_id = $user_id;

        // $property->customer_id = $request->customer_id;
        // $property->category_id = $request->category_id;

        $property->currency = $request->currency;
        $property->price = $request->price;
        // $property->discount = $request->discount;
        $property->type = $request->type;

        // $property->publish = $request->publish;
        $property->building_size = $request->building_size;
        $property->land_size = $request->land_size;

        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;

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
    }
}
