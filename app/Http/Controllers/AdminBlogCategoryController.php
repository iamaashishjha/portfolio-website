<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Traits\Base\BaseCrudController;

class AdminBlogCategoryController extends BaseCrudController
{
    protected $model;
    public function __construct()
    {
        $this->model = BlogCategory::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['categories'] = $this->model::notDeleted()->get();
        return view('ar.blog.category.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.blog.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCategoryRequest $request)
    {
        $this->checkPermission('create');
        $path = $request->category_image->store('blogs/blog-category', 'public');
        $category = new $this->model();
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
        $this->checkPermission('update');
        $category = $this->model::find($id);
        return view('ar.blog.category.form')
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
        $this->checkPermission('update');
        $category = $this->model::find($id);
        $category->title = $request->title;
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
        Alert::success('Category Updated Successfully');
        return redirect()->route('admin.blog.category.index');
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
        $category = $this->model::find($id);
        $imagePath = $category->image;
        // if ($category->posts->count() === 0) {
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $category->deleteImage();
        }
        $category->delete();
        Alert::success('Category Deleted Successfully');
        return redirect()->back();
        // } else {
        // Alert::toast('Category has Posts. Delete them first.', 'error');
        // return redirect()->back();
        // }
    }
}
