<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Models\TwitterVideo;
use Illuminate\Http\Request;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

class TwitterVideoController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = TwitterVideo::class;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['videos'] = $this->model::all();
        return view('ar.twitter-video.index', $this->data);
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
        $this->model::create($dataArr);
        Alert::success('Video Created successfully');
        return redirect()->route('admin.twitter-video.index');
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
        $video = $this->model::find($id);
        $video->update($dataArr);
        Alert::success('Video Updated successfully');
        return redirect()->route('admin.twitter-video.index');
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
        $video = $this->model::find($id);
        $video->delete();
        Alert::success('Video Deleted successfully');
        return redirect()->route('admin.twitter-video.index');
    }
}
