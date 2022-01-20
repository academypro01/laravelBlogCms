<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user','photo','category')->orderBy('id','desc')->get();
        return view('admin.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post();

        $file = $request->file('photo');
        $name = uniqid().time().$file->getClientOriginalName();
        $file->move('images', $name);

        $photo = new Photo();
        $photo->name = $file->getClientOriginalName();
        $photo->path = $name;
        $photo->user_id = Auth::id();
        $photo->save();

        $post->title = $request->title;
        $post->description = $request->description;
        if($request->slug != ''){
            $post->slug = make_slug($request->slug);
        }else{
            $post->slug = make_slug($request->title);
        }
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->user_id = Auth::id();
        $post->photo_id = $photo->id;
        $post->category_id = $request->category;
        $post->status = $request->status;

        $post->save();

        Session::flash('add_post','New Post Successfully Created.');
        return redirect(route('posts.index'));

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if($request->file('photo') != '') {
            $file = $request->file('photo');
            $name = uniqid().time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $post->photo_id = $photo->id;
        }

        if($request->slug != ''){
            $post->slug = make_slug($request->slug);
        }else{
            $post->slug = make_slug($request->title);
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        $post->status = $request->status;
        $post->save();
        Session::flash('update_post','Post Successfully Updated!');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $photo = Photo::findOrFail($post->photo_id);
        unlink(public_path() . $photo->path);
        $photo->delete();
        $post->delete();
        Session::flash('delete_post','Post Successfully Deleted');
        return redirect(route('posts.index'));
    }
}
