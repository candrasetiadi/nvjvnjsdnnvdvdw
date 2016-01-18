<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\GlobalController;

class BlogController extends GlobalController {

    protected $blog;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $blogs = Blog::orderBy('id', 'DESC')->get();

        foreach($blogs as $b) {

            $b->description = json_decode($b->description);
        }

        return response()->json($blogs);
    }



    public function getAll() {

        $blogs = Blog::orderBy('id', 'DESC')->get();

        return view('admin.page.blog', ['blogs' => $blogs, 'page' => 'Blogs']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

//        return response()->json(array('status' => 400, 'message' => array('title' => 'Wrong!', 'msg' => 'Somrthings not right mate'), 'data' => Input::all()));

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



    public function listing() {

        $blogs = Blog::orderBy('id', 'DESC')->get();

        return view('pages.blog-listing', ['navigation' => $this->navigation(), 'blogs' => $blogs, 'searchTerms' => $this->searchTerms(), 'cart' => $this->cartItems()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url) {
        //
        $blog = Blog::where('url', $url)->first();

        return view('pages.blog-view', ['navigation' => $this->navigation(), 'blog' => $blog, 'searchTerms' => $this->searchTerms(), 'cart' => $this->cartItems()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function retrieve($id) {
        //
        $blog = Blog::find($id);

        unset($blog['author_id']);

        unset($blog['updated_at']);

        unset($blog['created_at']);

        unset($blog['deleted_at']);

        return response()->json($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update() {

        $timestamp = time();

        $this->blog = $this->blog->find(Input::get('id'));

        $oldImageFile = $this->blog->image;

        $this->blog->url = Input::get('url');

        $urlConflict = Blog::where('url', $this->blog->url)->where('id', '<>', Input::get('id'))->first();

        if($urlConflict) return response()->json(array('status' => 405, 'message' => array('title' => 'Blog Error', 'msg' => 'Blog with same url already exists, please insert a different url')));

        if(Input::hasFile('blog-banner')) {

            $oldImage = public_path('media/blog/') . $oldImageFile;

            !is_dir($oldImage) ? unlink($oldImage) : '';

            $fileName = Input::file('blog-banner')->getClientOriginalName();

            $fExp = explode('.', $fileName);

            $fileExt = end($fExp);

            Input::file('blog-banner')->move(public_path('media/blog'), $timestamp . '.' . $fileExt);
        }

        $this->blog->title = Input::get('title');

        $this->blog->locale = Input::get('locale');

        $this->blog->status = Input::get('status');

        $this->blog->tags = Input::get('tags');

        $this->blog->meta_desc = Input::get('meta_desc');

        $this->blog->category = Input::get('category');

        $this->blog->content = Input::get('content');

        if(isset($fileName)) {

            $this->blog->image = $timestamp . '.' . $fileExt;
        }

        $this->blog->save();

        return response()->json(array('status' => 200, 'message' => array('title' => 'Blog Update', 'msg' => 'Blog has been updated')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $blog = Blog::find($id);

        (!is_dir(public_path('media/blog/') . $blog->image) ? unlink(public_path('media/blog/') . $blog->image) : '');

        $blog->delete();

        return redirect(baseUrl() . '/admin/blog');
    }
}
