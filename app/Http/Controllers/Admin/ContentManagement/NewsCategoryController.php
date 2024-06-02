<?php

namespace App\Http\Controllers\Admin\ContentManagement;

use App\Traits\AuthTrait;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreNewsCategoryRequest;
use App\Http\Requests\UpdateNewsCategoryRequest;
// use Prologue\Alerts\Facades\Alert;

class NewsCategoryController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = NewsCategory::class;
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
        return view('ar.news.category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.news.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsCategoryRequest $request)
    {
        $this->checkPermission('create');
        $path = $request->category_image->store('news/news-category', 'public');
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

        Alert::success('Category Created Successfully');
        // alert()->success('Success Message', 'Category Created Successfully');
        return redirect()->route('admin.news.category.index');
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
        $this->data['category'] = $this->model::find($id);
        return view('ar.news.category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsCategoryRequest $request, $id)
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
            $path = $request->category_image->store('news/news-category', 'public');
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
        Alert::success('Category Updated Successfully');
        return redirect()->route('admin.news.category.index');

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
        $this->checkPermission('delete');
        $category = $this->model::find($id);
        $imagePath = $category->image;
        // if ($category->posts->count() = 0) {
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $category->deleteImage();
            }

            $category->delete();
            Alert::success('Category Deleted Successfully');
            return redirect()->back();
        // } else {
            // Alert::error('Category has Posts. Delete them first.');
            // return redirect()->back();
        // }
    }
}
