<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\BaseController;
use App\Http\Middleware\User;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\StoreUserBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Http\Requests\UpdateUserBlogPostRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Notifications\PostCreated;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserBlogPostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $categories = BlogCategory::where('is_deleted', 0)
            ->where('status', 1)
            ->get();

        $tags = BlogTags::where('is_deleted', 0)
            ->where('status', 1)
            ->get();

        $posts = BlogPost::where('is_deleted', 0)
            ->where('created_by', $user)
            ->get();

        return view('ur.blog.post.index')
            ->with('tags', $tags)
            ->with('categories', $categories)
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::where('is_deleted', 0)
            ->where('status', 1)
            ->get();

        $tags = BlogTags::where('is_deleted', 0)
            ->where('status', 1)
            ->get();

        return view('ur.blog.post.create')
            ->with('tags', $tags)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserBlogPostRequest $request)
    {
        $post = new BlogPost();

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
        return redirect()->route('user.post.index');

        // $userSchema = Auth::user();
  
        // $post = [
        //     'name' => $post->title,
        //     'body' => $post->description = $request->description,
        //     'thanks' => 'Thank you',
        //     'offerText' => 'Check out the offer',
        //     'offerUrl' => url('/'),
        // ];
  
        // Notification::send($userSchema, new PostCreated($post));
        // $userSchema->notify(new PostCreated($post));
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
        $categories = BlogCategory::where('is_deleted', 0)
            ->where('status', 1)
            ->get();

        $tags = BlogTags::where('is_deleted', 0)
            ->where('status', 1)
            ->get();

        $post = BlogPost::find($id);

        return view('ar.blog.post.create')
            ->with('tags', $tags)
            ->with('categories', $categories)
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserBlogPostRequest $request, $id)
    {
        $post = BlogPost::find($id);

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
            $path = $request->category_image->store('blogs/blog-post', 'public');
            $post->category_image = $path;
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
        return redirect()->route('user.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::withTrashed()
            ->where('id', $id)->first();
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
        $user = Auth::user()->id;
        $posts = BlogPost::onlyTrashed()->where('is_deleted', 0)->where('created_by', $user)->get();
        return view('ur.blog.post.trash')
            ->with('posts', $posts);
    }

    public function restore($id)
    {
        $post = BlogPost::onlyTrashed()
            ->where('id', $id)
            ->first();

        $post->restore();
        Alert::toast('Post Restored Successfully', 'success');
        return redirect()->back();
        # code...
    }
}