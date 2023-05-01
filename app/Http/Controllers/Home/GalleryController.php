<?php

namespace App\Http\Controllers\Home;

use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Base\BaseHomeController;

class GalleryController extends BaseHomeController
{
    public function listVideos()
    {
        $this->data['youtubeVideos'] = YoutubeVideo::orderBy('created_at', 'DESC')->get();
        return view('customHome.video.index', $this->data);
    }
}
