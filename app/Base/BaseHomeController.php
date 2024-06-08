<?php

namespace App\Base;

use App\Models\Event;
use App\Models\Saying;
use App\Models\Slider;
use App\Models\History;
use App\Models\Library;
use App\Models\Thought;
use App\Models\BlogPost;
use App\Models\Document;
use App\Models\Donation;
use App\Models\NewsPost;
use App\Models\Committee;
use App\Models\Goverment;
use App\Models\Leadership;
use App\Models\Member;
use App\Models\Parliament;
use App\Models\AppSettings;
use App\Models\PopupNotice;
use App\Models\TwitterVideo;
use App\Models\YoutubeVideo;
use App\Models\FacebookVideo;
use App\Models\CompanyDetails;
use App\Models\MassOrganization;
use App\Http\Controllers\Controller;

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
        $this->data['approvedMembers'] = Member::approvedMember()->get();

        $this->data['documents'] = Document::orderBy('created_at', 'DESC')->get();
        $this->data['libraries'] = Library::orderBy('created_at', 'DESC')->get();

        $this->data['blogPosts'] = BlogPost::orderBy('created_at', 'DESC')->take(3)->get();
        $this->data['events'] = Event::orderBy('created_at', 'DESC')->take(3)->get();

        $this->data['newsPosts'] = NewsPost::orderBy('created_at', 'DESC')->take(3)->get();
        $this->data['latestNewsPost'] = NewsPost::orderBy('created_at', 'DESC')->first();
        $this->data['exceptLatestNews'] = NewsPost::orderBy('created_at', 'DESC')->skip(1)->take(6)->get();

        $this->data['thoughts'] = Thought::orderBy('created_at', 'DESC')->take(4)->get();
        $this->data['sayings'] = Saying::orderBy('created_at', 'DESC')->take(4)->get();


        $this->data['histories'] = History::orderBy('created_at', 'DESC')->get();
        $this->data['parliaments'] = Parliament::orderBy('created_at', 'DESC')->get();
        $this->data['goverments'] = Goverment::orderBy('created_at', 'DESC')->get();

        $this->data['youtubeVideos'] = YoutubeVideo::orderBy('created_at', 'DESC')->take(4)->get();
        $this->data['facebookVideos'] = FacebookVideo::orderBy('created_at', 'DESC')->take(4)->get();
        $this->data['twitterVideos'] = TwitterVideo::orderBy('created_at', 'DESC')->take(4)->get();
        $this->data['leaderships'] = Leadership::orderBy('created_at', 'DESC')->get();

        // Footer
        // $this->data['footerNews'] = NewsPost::orderBy('created_at', 'DESC')->skip(1)->take(2)->get();

        $this->data['notices'] = PopupNotice::active()->orderBy('created_at', 'DESC')->get();
        $this->data['massOrganization'] =  MassOrganization::first();
        $this->data['donation'] =  Donation::first();


    }
}
