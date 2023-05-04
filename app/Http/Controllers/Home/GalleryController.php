<?php

namespace App\Http\Controllers\Home;

use App\Models\YoutubeVideo;
use App\Models\FacebookVideo;
use App\Models\TwitterVideo;
use App\Traits\Base\BaseHomeController;

class GalleryController extends BaseHomeController
{
    public function listYoutubeVideos()
    {
        $this->data['youtubeVideos'] = YoutubeVideo::orderBy('created_at', 'DESC')->get();
        return view('customHome.video.youtube', $this->data);
    }

    public function listFacebookVideos()
    {
        $this->data['facebookVideos'] = FacebookVideo::orderBy('created_at', 'DESC')->get();
        return view('customHome.video.facebook', $this->data);
    }

    public function listTwitterVideos()
    {
        $this->data['twitterVideos'] = TwitterVideo::orderBy('created_at', 'DESC')->get();
        return view('customHome.video.twitter', $this->data);
    }
}
