<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\BlogCategory;
// use Facade\FlareClient\Stacktrace\File;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use UxWeb\SweetAlert\SweetAlert;

class AdminBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::all();
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
    public function store(AdminCategoryCreateRequest $request)
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
    public function update(AdminCategoryUpdateRequest $request, $id)
    {
        $blogCategory = BlogCategory::find($id);

        $blogCategory->title = $request->title;
        $blogCategory->description = $request->description;

        if ($request->has('category_image') && ($request->category_image != '')) {
            $imagePath = public_path('storage/' . $blogCategory->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
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
        return redirect(route('category.index'));
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
        $category->delete();
        Alert::toast('Category Deleted Successfully', 'success');
        return redirect()->back();
    }
}
