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
        if ($request->edit != 0) return $this->update($request, $request->edit);


        $validator = \Validator::make($request->all(), [
            'title' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(array('status' => 500, 'monolog' => array('title' => 'errors', 'message' => implode($validator->errors()->all(), '<br>') )));
        }

        DB::beginTransaction();

        $category = new Category;

        $category->route = str_slug($request->title);
        $category->parent = $request->parent;
        $category->order = 0;

        $category->save();

        $categoryLanguage = new \App\CategoryLanguage;

        $categoryLanguage->category_id = $category->id;
        $categoryLanguage->title = $request->title;
        $categoryLanguage->description = $request->description;
        $categoryLanguage->locale = 'en';

        $categoryLanguage->save();

        DB::commit();

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'save success', 'message' => 'Category has been saved.')));
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

        $category->lang = $category->categoryLanguages()->where('locale', 'en')->first();

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

        $validator = \Validator::make($request->all(), [
            'title' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(array('status' => 500, 'monolog' => array('title' => 'errors', 'message' => implode($validator->errors()->all(), '<br>') )));
        }

        DB::beginTransaction();

        $category = Category::find($id);

        $category->parent = $request->parent;
        // $category->order = 0;

        $category->save();

        $categoryLanguage = \App\CategoryLanguage::where('category_id', $id)->where('locale', 'en')->first();

        $categoryLanguage->title = $request->title;
        $categoryLanguage->description = $request->description;

        $categoryLanguage->save();

        DB::commit();

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'update success', 'message' => 'Category has been updated.')));
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

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'delete success', 'message' => 'Category has been deleted.'), 'id' => $id));
    }


    public function getTranslate($id)
    {

        $enLang = \App\CategoryLanguage::where('category_id', $id)->where('locale', 'en')->first();

        $idLang = \App\CategoryLanguage::where('category_id', $id)->where('locale', 'id')->first();

        $frLang = \App\CategoryLanguage::where('category_id', $id)->where('locale', 'fr')->first();

        $ruLang = \App\CategoryLanguage::where('category_id', $id)->where('locale', 'ru')->first();

        return response()->json(['en' => $enLang, 'id' => $idLang, 'fr' => $frLang, 'ru' => $ruLang]);
    }


    public function storeTranslate(Request $request)
    {
        DB::beginTransaction();

        foreach ($request->title as $key => $title) {

            $categoryLang = \App\CategoryLanguage::where('category_id', $request->edit_translate)->where('locale', $key)->first();

            if ($categoryLang) {

                $categoryLang->title = $title ? $title : '' ;
                $categoryLang->description = $request->description[$key] ? $request->description[$key] : '' ;

                $categoryLang->save();

            } else {

                $categoryLang = new \App\CategoryLanguage;

                if ($title) $categoryLang->title = $title;
                if ($request->description[$key]) $categoryLang->description = $request->description[$key];

                if ($title || $request->description[$key]) {

                    $categoryLang->locale = $key;
                    $categoryLang->category_id = $request->edit_translate;

                    $categoryLang->save();
                }

            }

        }

        DB::commit();

        return response()->json(array('status' => 200, 'monolog' => array('title' => 'update translation success', 'message' => 'Translation has been updated')));
    }


}
