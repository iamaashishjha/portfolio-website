<?php

namespace App\Http\Controllers;

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

class AdminBlogTagController extends Controller
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
        $blogCategory = new BlogTags();
        $blogCategory->title = $request->title;
        $blogCategory->description = $request->description;
        $blogCategory->tag_image = $path;
        $blogCategory->meta_description = $request->meta_description;
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->slug = $request->slug;

        if ($request->has('status')) {
            //Checkbox checked
            $blogCategory->status = 1;
        } else {
            //Checkbox not checked
            $blogCategory->status = 0;
        }

        $blogCategory->keywords = $request->keywords;
        $blogCategory->created_by = Auth::user()->id;
        $blogCategory->save();

        Alert::toast('Tag Created Successfully', 'success');
        return redirect(route('tag.index'));
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
            $imagePath = public_path('storage/' . $tag->tag_image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
                File::delete('blogs/blog-category/' . $tag->tag_image);
            }
            $path = $request->tag_image->store('blogs/blog-category', 'public');
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
        return redirect(route('tag.index'));
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
        $tag->delete();
        // $category->is_deleted = 1;
        // $category->deleted_by = Auth::user()->id;
        Alert::toast('Tag Deleted Successfully', 'success');
        return redirect()->back();
    }
}
