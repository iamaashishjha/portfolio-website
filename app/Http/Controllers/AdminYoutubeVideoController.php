<?php

namespace App\Http\Controllers;

use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use App\Traits\Base\BaseCrudController;
use RealRashid\SweetAlert\Facades\Alert;

class AdminYoutubeVideoController extends BaseCrudController
{
    protected $model;
    public function __construct()
    {
        $this->model = YoutubeVideo::class;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['youtubeVideos'] = YoutubeVideo::all();
        return view('ar.youtube-video.index', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkPermission('create');
        $dataArr = $request->only(['title', 'iframe']);
        YoutubeVideo::create($dataArr);
        Alert::success('Video Created successfully');
        return redirect()->route('admin.youtube-video.index');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkPermission('update');
        $dataArr = $request->only(['title', 'iframe']);
        $video = YoutubeVideo::find($id);
        $video->update($dataArr);
        Alert::success('Video Updated successfully');
        return redirect()->route('admin.youtube-video.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkPermission('delete');
        $video = YoutubeVideo::find($id);
        $video->delete();
        Alert::success('Video Deleted successfully');
        return redirect()->route('admin.youtube-video.index');
    }
}
