<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $posts = Post::count();
        $users = User::count();
        $categories = Category::count();
        $photos = Photo::count();
        $lastPosts = Post::orderBy('created_at','DESC')->limit(5)->get();
        $lastUsers = User::orderBy('created_at','DESC')->limit(5)->get();
        return view('admin.dashboard.index', compact(['posts','users','categories','photos','lastPosts','lastUsers']));
    }
}
