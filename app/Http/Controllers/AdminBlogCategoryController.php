<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoryCreateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ar.blog.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCategoryCreateRequest $request)
    {
        $path = $request->category_image->store('blogs', 'public');
        $blogCategory = new BlogCategory();
        $blogCategory->title = $request->title;
        $blogCategory->description = $request->description;
        $blogCategory->category_image = $path;
        $blogCategory->meta_description = $request->meta_description;
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->keywords = $request->keywords;
        $blogCategory->user_id = Auth::user()->id;
        $blogCategory->save();

        // BlogCategory::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'category_image' => $path,
        //     'meta_description' => $request->meta_description,
        //     'meta_title' => $request->meta_title,
        //     'keywords' => $request->keywords,
        //     'user_id' => Auth::user()->id
        // ]);
        return redirect(route('category.index'));
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
        //
    }
}
