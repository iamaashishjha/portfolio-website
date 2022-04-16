<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends BaseController
{

    public function index()
    {
        $users = User::all();
        $userCount = $users->count();
        $categories = BlogCategory::where('status', 1)->get();
        $catCount = $categories->count();
        $tags = BlogTags::where('status', 1)->get();
        $tagCount = $tags->count();
        $post = BlogPost::where('status', 1)->get();
        $postsCount = $post->count();
        // return view('ar.index')
        return view('dashboard.index')
        ->with('userCount', $userCount)
        ->with('catCount', $catCount)
        ->with('tagCount', $tagCount)
        ->with('postsCount', $postsCount);
    }
}
