<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreBlogTagsRequest;
use App\Http\Requests\UpdateBlogTagsRequest;
use App\Models\BlogTags;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use UxWeb\SweetAlert\SweetAlert;

class AdminBlogTagController extends BaseController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = BlogTags::where('is_deleted', 0)->get();
        return view('ar.blog.tag.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.blog.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogTagsRequest $request)
    {
        $path = $request->tag_image->store('blogs/blog-tag', 'public');
        $tag = new BlogTags();
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
        return redirect()->route('admin.blog.tag.index');
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
        $tag = BlogTags::find($id);
        return view('ar.blog.tag.create')
            ->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogTagsRequest $request, $id)
    {
        $tag = BlogTags::find($id);

        $tag->title = $request->title;
        $tag->description = $request->description;

        if ($request->has('tag_image') && ($request->tag_image != '')) {
            $imagePath = $tag->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $tag->deleteImage();
            }
            $path = $request->tag_image->store('blogs/blog-tag', 'public');
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
        return redirect()->route('admin.blog.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = BlogTags::find($id);
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
