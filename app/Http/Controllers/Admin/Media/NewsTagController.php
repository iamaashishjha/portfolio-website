<?php

namespace App\Http\Controllers\Admin\Media;

use App\Models\NewsTags;
use App\Traits\AuthTrait;
use App\Models\AppSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Requests\StoreNewsTagsRequest;
use App\Http\Requests\UpdateNewsTagsRequest;

class NewsTagController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = NewsTags::class;
        $this->data['appSetting'] = AppSettings::first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');

        $this->data['tags'] = $this->model::get();
        return view('ar.news.tag.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.news.tag.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsTagsRequest $request)
    {
        $this->checkPermission('create');
        $path = $request->tag_image->store('news/news-tag', 'public');
        $tag = new $this->model();
        $tag->title = $request->title;
        $tag->description = $request->description;
        $tag->tag_image = $path;
        $tag->meta_description = $request->meta_description;
        $tag->meta_title = $request->meta_title;
        $tag->slug = $request->slug;

        if ($request->has('status')) {
            //Checkbox checked
            $tag->status = 1;
        } else {
            //Checkbox not checked
            $tag->status = 0;
        }

        $tag->keywords = $request->keywords;
        $tag->created_by = Auth::user()->id;
        $tag->save();

        Alert::toast('Tag Created Successfully', 'success');
        return redirect()->route('admin.news.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkPermission('update');
        $this->data['tag'] = $this->model::find($id);
        return view('ar.news.tag.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsTagsRequest $request, $id)
    {
        $this->checkPermission('update');
        $tag = $this->model::find($id);

        $tag->title = $request->title;
        $tag->description = $request->description;

        if ($request->has('tag_image') && ($request->tag_image != '')) {
            $imagePath = $tag->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $tag->deleteImage();
            }
            $path = $request->tag_image->store('news/news-tag', 'public');
            $tag->tag_image = $path;
        }

        if ($request->has('status')) {
            $tag->status = 1;
        } else {
            $tag->status = 0;
        }

        $tag->meta_description = $request->meta_description;
        $tag->meta_title = $request->meta_title;
        $tag->slug = $request->slug;

        $tag->keywords = $request->keywords;
        $tag->updated_by = Auth::user()->id;
        $tag->updated_at = now();

        $tag->save();
        Alert::toast('Tag Updated Successfully', 'success');
        return redirect()->route('admin.news.tag.index');
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
        $tag = $this->model::find($id);
        $imagePath = $tag->image;
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $tag->deleteImage();
        }
        $tag->delete();


        // $category->is_deleted = 1;
        // $category->deleted_by = Auth::user()->id;
        Alert::toast('Tag Deleted Successfully', 'success');
        return redirect()->back();
    }
}
