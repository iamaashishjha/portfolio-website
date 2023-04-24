<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\Base\BaseCrudController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;

class AdminBlogPostController extends BaseCrudController
{
    protected $model;

    public function __construct()
    {
        $this->model = BlogPost::class;
        $this->data['categories'] = BlogCategory::notDeleted()->active()->get();
        $this->data['tags'] = BlogTags::notDeleted()->active()->get();
        $this->data['posts'] = $this->model::notDeleted()->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        return view('ar.blog.post.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.blog.post.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPostRequest $request)
    {
        $this->checkPermission('create');
        $post = new $this->model();

        $path = $request->post_image->store('blogs/blog-post', 'public');
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->post_image = $path;
        $post->alt_text = $request->alt_text;
        $post->post_date = $request->post_date;
        $post->meta_description = $request->meta_description;
        $post->meta_title = $request->meta_title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        if ($request->has('status')) {
            //Checkbox checked
            $post->status = 1;
        } else {
            //Checkbox not checked
            $post->status = 0;
        }

        if ($request->has('featured')) {
            //Checkbox checked
            $post->featured = 1;
        } else {
            //Checkbox not checked
            $post->featured = 0;
        }

        $post->keywords = $request->keywords;
        $post->created_by = Auth::user()->id;
        $post->save();
        $post->blogTags()->attach($request->tags);
        Alert::toast('Post Created Successfully', 'success');
        return redirect()->route('admin.blog.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['post'] = $this->model::find($id);
        if($this->data['post']){
            $this->data['post']->viewIncrement();
        }
        return view('ar.blog.post.show', $this->data);
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
        $this->data['post'] = $this->model::find($id);
        return view('ar.blog.post.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogPostRequest $request, $id)
    {
        $this->checkPermission('update');
        $post = $this->model::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->alt_text = $request->alt_text;
        $post->post_date = $request->post_date;
        $post->meta_description = $request->meta_description;
        $post->meta_title = $request->meta_title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        if ($request->has('post_image')) {
            $path = $request->post_image->store('blogs/blog-post', 'public');
            $post->post_image = $path;
        }

        if ($request->has('post_image') && ($request->post_image != '')) {

            $imagePath = $post->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $post->deleteImage();
            }
            $path = $request->post_image->store('blogs/blog-post', 'public');
            $post->post_image = $path;
        }

        if ($request->has('status')) {
            //Checkbox checked
            $post->status = 1;
        } else {
            //Checkbox not checked
            $post->status = 0;
        }

        if ($request->has('featured')) {
            //Checkbox checked
            $post->featured = 1;
        } else {
            //Checkbox not checked
            $post->featured = 0;
        }

        $post->keywords = $request->keywords;
        $post->created_by = Auth::user()->id;
        $post->save();

        $post->blogTags()->attach($request->tags);

        Alert::toast('Post Updated Successfully', 'success');
        return redirect()->route('admin.blog.post.index');
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
        $post = $this->model::withTrashed()->where('id', $id)->first();
        $imagePath = $post->image;
        if ($post->trashed()) {
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $post->deleteImage();
            }
            $post->forceDelete();
            Alert::toast('Post Deleted Successfully', 'success');
            return redirect()->back();
        } else {
            $post->delete();
            $post->is_deleted = 1;
            $post->status = 0;
            $post->deleted_by = Auth::user()->id;
            Alert::toast('Post Trashed Successfully', 'success');
            return redirect()->back();
        }
    }

    public function trashed()
    {
        $this->checkPermission('delete');
        $this->data['posts'] = $this->model::onlyTrashed()->deleted()->get();
        return view('ar.blog.post.trash',$this->data);
    }

    public function restore($id)
    {
        $this->checkPermission('delete');
        $post = $this->model::onlyTrashed()
            ->where('id', $id)
            ->first();
        $post->restore();
        Alert::toast('Post Restored Successfully', 'success');
        return redirect()->back();
    }
}
