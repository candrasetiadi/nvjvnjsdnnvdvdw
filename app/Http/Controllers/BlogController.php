<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\GlobalController;

class BlogController extends GlobalController {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store() {

        $edit = Input::get('edit');

        $url = Input::get('url');
        $title = Input::get('title');

        if($url == '') return response()->json(array('status' => 405, 'message' => array('title' => 'Blog Error', 'msg' => 'Make sure to provide a url!'), 'data' => Input::all()));

        if($title == '') return response()->json(array('status' => 405, 'message' => array('title' => 'Blog Error', 'msg' => 'Make sure to provide a title!'), 'data' => Input::all()));

        if($edit != 0) {

            $blog = Blog::find($edit);

        } else {

            $blog = new Blog;

            $urlConflict = Blog::where('url', $url)->first();

            if($urlConflict != NULL) return response()->json(array('status' => 405, 'message' => array('title' => 'Blog Error', 'msg' => 'Blog with same url already exists, please insert a different url'), 'data' => Input::all()));
        }

        $blog->url = $url;

        $timestamp = time();

        if(Input::hasFile('media')) {

            if($edit != 0 && $blog->image != '') unlink(public_path('media/blog/') . $blog->image);

            $fileExt = Input::file('media')->getClientOriginalExtension();

            $moved = Input::file('media')->move(public_path('media/blog'), $timestamp . '.' . $fileExt);

            $blog->image = $timestamp . '.' . $fileExt;
        }

        $blog->title = Input::get('title');

        $blog->locale = Input::get('lang');

        $blog->status = Input::get('status');

        $blog->tags = Input::get('tags');

        $blog->meta_desc = Input::get('meta_desc');

        $blog->category = Input::get('category');

        $blog->content = Input::get('content');

        $blog->author_id = Input::get('author');

        $blog->save();

        return response()->json(array('status' => 200, 'message' => array('title' => 'Blog Posted', 'msg' => 'Blog has been inserted')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

    }
}
