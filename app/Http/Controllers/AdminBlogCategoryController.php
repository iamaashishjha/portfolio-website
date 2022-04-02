<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBlogCategoryController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::where('is_deleted', 0)
            ->get();
        return view('ar.blog.category.index')
            ->with('categories', $categories);
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
    public function store(StoreBlogCategoryRequest $request)
    {
        $path = $request->category_image->store('blogs/blog-category', 'public');
        $blogCategory = new BlogCategory();
        $blogCategory->title = $request->title;
        $blogCategory->description = $request->description;
        $blogCategory->category_image = $path;
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

        Alert::toast('Category Created Successfully', 'success');
        // alert()->success('Success Message', 'Category Created Successfully');
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
        $category = BlogCategory::find($id);
        return view('ar.blog.category.create')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogCategoryRequest $request, $id)
    {
        $blogCategory = BlogCategory::find($id);

        $blogCategory->title = $request->title;
        $blogCategory->description = $request->description;

        if ($request->has('category_image') && ($request->category_image != '')) {

            $imagePath = $blogCategory->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $blogCategory->deleteImage();
            }
            $path = $request->category_image->store('blogs/blog-category', 'public');
            $blogCategory->category_image = $path;
        }

        if ($request->has('status')) {
            $blogCategory->status = 1;
        } else {
            $blogCategory->status = 0;
        }

        $blogCategory->meta_description = $request->meta_description;
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->slug = $request->slug;

        $blogCategory->keywords = $request->keywords;
        $blogCategory->updated_by = Auth::user()->id;
        $blogCategory->updated_at = now();

        $blogCategory->save();
        Alert::toast('Category Updated Successfully', 'success');

        // return redirect()->route('category.index')->with('message','Data added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = BlogCategory::find($id);
        $imagePath = $category->image;
        if ($category->posts->count() < 0) {
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $category->deleteImage();
            }

            $category->delete();
            Alert::toast('Category Deleted Successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Category has Posts. Delete them first.', 'error');
            return redirect()->back();
        }
    }
}
