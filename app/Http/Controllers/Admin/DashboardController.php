<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\NewsPost;
use App\Models\NewsTags;
use App\Models\BlogCategory;
use App\Models\NewsCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public $data;
    public function index()
    {
        $this->data['userCount'] = count(User::all());
        $this->data['memberCount'] = 0;
        $this->data['eventsCount'] = count(Event::all());
        $this->data['blogsCatCount'] = count(BlogCategory::where('status', 1)->get());
        $this->data['blogsTagsCount'] = count(BlogTags::where('status', 1)->get());
        $this->data['blogsPostsCount'] = count(BlogPost::where('status', 1)->get());
        $this->data['newsCatCount'] = count(NewsCategory::where('status', 1)->get());
        $this->data['newsTagsCount'] = count(NewsTags::where('status', 1)->get());
        $this->data['newsPostsCount'] = count(NewsPost::where('status', 1)->get());
        return view('ar.index', $this->data);
    }
}
