<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert;
use Prologue\Alerts\Facades\Alert;

// use Alert



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
        $category = new BlogCategory();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->category_image = $path;
        $category->meta_description = $request->meta_description;
        $category->meta_title = $request->meta_title;
        $category->slug = $request->slug;

        if ($request->has('status')) {
            //Checkbox checked
            $category->status = 1;
        } else {
            //Checkbox not checked
            $category->status = 0;
        }

        $category->keywords = $request->keywords;
        $category->created_by = Auth::user()->id;
        $category->save();

        Alert::toast('Category Created Successfully', 'success');
        // alert()->success('Success Message', 'Category Created Successfully');
        return redirect()->route('admin.blog.category.index');
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
        $category = BlogCategory::find($id);

        // $category->title = $request->title;
        $category->description = $request->description;

        if ($request->has('category_image') && ($request->category_image != '')) {

            $imagePath = $category->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $category->deleteImage();
            }
            $path = $request->category_image->store('blogs/blog-category', 'public');
            $category->category_image = $path;
        }

        if ($request->has('status')) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }

        $category->meta_description = $request->meta_description;
        $category->meta_title = $request->meta_title;
        $category->slug = $request->slug;

        $category->keywords = $request->keywords;
        $category->updated_by = Auth::user()->id;
        $category->updated_at = now();

        $category->save();
        // Alert::toast('Category Updated Successfully', 'success');
        Alert::success('Category Updated Successfully')->flash();
        return redirect()->route('admin.blog.category.index');

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
