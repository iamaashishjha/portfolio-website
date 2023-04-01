<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\Event;
use App\Models\Membership;
use App\Models\NewsCategory;
use App\Models\NewsPost;
use App\Models\NewsTags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends BaseController
{

    public function index()
    {
        // $this->checkCRUDPermission('App\Models\CompanyDetails', 'update');
        $this->data['userCount'] = count(User::all());
        $this->data['memberCount'] = count(Membership::all());
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
