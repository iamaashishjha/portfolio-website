<?php

namespace App\Traits\Base;

use App\Models\Event;
use App\Models\Slider;
use App\Models\History;
use App\Models\BlogPost;
use App\Models\Document;
use App\Models\NewsPost;
use App\Models\Committee;
use App\Models\AppSettings;
use App\Models\YoutubeVideo;
use App\Models\CompanyDetails;
use App\Http\Controllers\Controller;
use App\Models\Goverment;
use App\Models\Parliament;
use App\Models\Thought;

class BaseHomeController extends Controller
{
    public $data;

     /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->data['appSetting'] = AppSettings::first();
        $this->data['companyDetails'] = CompanyDetails::first();
        $this->data['slider'] = Slider::first();


        $this->data['documents'] = Document::orderBy('created_at', 'DESC')->get();

        $this->data['blogPosts'] = BlogPost::orderBy('created_at', 'DESC')->take(3)->get();

        $this->data['events'] = Event::orderBy('created_at', 'DESC')->skip(1)->take(3)->get();

        $this->data['newsPosts'] = NewsPost::orderBy('created_at', 'DESC')->take(3)->get();

        $this->data['thoughts'] = Thought::orderBy('created_at', 'DESC')->get();

        $this->data['latestNewsPost'] = NewsPost::orderBy('created_at', 'DESC')->first();

        $this->data['exceptLatestNews'] = NewsPost::orderBy('created_at', 'DESC')->skip(1)->take(6)->get();

        $this->data['histories'] = History::orderBy('created_at', 'DESC')->get();
        $this->data['parliaments'] = Parliament::orderBy('created_at', 'DESC')->get();
        $this->data['goverments'] = Goverment::orderBy('created_at', 'DESC')->get();
        
        $this->data['youtubeVideos'] = YoutubeVideo::orderBy('created_at', 'DESC')->get();
        $this->data['committees'] = Committee::orderBy('created_at', 'DESC')->get();

        $this->data['footerNews'] = NewsPost::orderBy('created_at', 'DESC')->skip(1)->take(2)->get();


    }
}