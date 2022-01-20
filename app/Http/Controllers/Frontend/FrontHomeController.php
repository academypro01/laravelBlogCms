<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','photo','category')->where('status',1)->orderBy('created_at','desc')->paginate(3);
        $categories = Category::all();
        $limitPost = Post::with('user','photo','category')->where('status','1')->orderBy('created_at','desc')->limit(3)->get();
        $lastPost = Post::with('user','photo','category')->where('status','1')->orderBy('created_at','desc')->first();
        return view('front.index', compact(['posts', 'categories', 'limitPost', 'lastPost']));
    }

    public function postsCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::all();
        return view('front.showCategory', compact(['category', 'posts']));
    }

    public function showSinglePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('front.showPost', compact(['post']));
    }
}
