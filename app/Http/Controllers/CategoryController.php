<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;

use DB;

class CategoryController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        DB::beginTransaction();

        $category = new Category;

        $category->parent = 0;
        $category->order = 0;

        $category->save();

        $categoryLanguage = new \App\CategoryLanguage;

        $categoryLanguage->category_id = $category->id;
        $categoryLanguage->title = $request->title;
        $categoryLanguage->description = $request->description;
        $categoryLanguage->locale = 'en';

        $categoryLanguage->save();

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
        $category = Category::find($id);

        return $category;
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
        $category = Category::find($id);

        $category->delete();

        return redirect()->back();
    }
}
