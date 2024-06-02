<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\Event;
use App\Models\Member;
use App\Models\NewsCategory;
use App\Models\NewsPost;
use App\Models\NewsTags;
use App\Models\User;
use App\Traits\Base\BaseAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseAdminController
{

    public function index()
    {
        // dd('ok');
        $this->data['userCount'] = count(User::all());
        // $this->data['memberCount'] = count(Member::all());
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
