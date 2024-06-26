<?php

namespace App\Http\Controllers\Admin\Administration;

use App\Models\Slider;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

use App\Traits\Base\BaseAdminController;

class SliderController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = Slider::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['sliders'] = $this->model::all();
        $this->data['totalData'] = count($this->model::all());
        return view('ar.slider.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.slider.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $this->checkPermission('create');

        $path1 = $request->slider_image_a->store('home/slider', 'public');

        if($request->has('slider_image_b')){
            $path2 = $request->slider_image_b->store('home/slider', 'public');
        }else{
            $path2 = NULL;
        }
        if($request->has('slider_image_c')){
            $path3 = $request->slider_image_c->store('home/slider', 'public');
        }else{
            $path3 = NULL;
        }
        if($request->has('slider_image_d')){
            $path4 = $request->slider_image_d->store('home/slider', 'public');
        }else{
            $path4 = NULL;
        }
        if($request->has('slider_image_e')){
            $path5 = $request->slider_image_e->store('home/slider', 'public');
        }else{
            $path5 = NULL;
        }

        $slider = new $this->model();
        $slider->slider_title = $request->slider_title;
        $slider->slider_description = $request->slider_description;
        $slider->image_a = $path1;
        $slider->heading1 = $request->heading1;
        $slider->subheading1 = $request->subheading1;
        $slider->image_b = $path2;
        $slider->heading2 = $request->heading2;
        $slider->subheading2 = $request->subheading2;
        $slider->image_c = $path3;
        $slider->heading3 = $request->heading3;
        $slider->subheading3 = $request->subheading3;
        $slider->image_d = $path4;
        $slider->heading4 = $request->heading4;
        $slider->subheading4 = $request->subheading4;
        $slider->image_e = $path5;
        $slider->heading5 = $request->heading5;
        $slider->subheading5 = $request->subheading5;

        if ($request->has('is_active')) {
            $slider->is_active = 1;
        } else {
            $slider->is_active = 0;
        }

        $slider->created_by = Auth::user()->id;
        $slider->save();
        // Alert::toast('Slider Created successfully', 'success');
        Alert::success('Slider Created successfully');
        return redirect()->route('admin.slider.index');
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
        $this->data['slider'] = $this->model::find($id);
        return view('ar.slider.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, $id)
    {
        $this->checkPermission('update');

        $slider = $this->model::find($id);

        if ($request->has('slider_image_a') && ($request->slider_image_a != '')) {
            $image_Path1 = $slider->image_a;
            if (File::exists($image_Path1)) {
                unlink($image_Path1);
                $slider->deleteImage(1);
            }
            $path1 = $request->slider_image_a->store('home/slider', 'public');
            $slider->image_a = $path1;
        }

        if ($request->has('slider_image_b') && ($request->slider_image_b != '')) {
            $image_Path2 = $slider->image_b;
            if (File::exists($image_Path2)) {
                unlink($image_Path2);
                $slider->deleteImage(2);
            }
            $path2 = $request->slider_image_b->store('home/slider', 'public');
            $slider->image_b = $path2;
        }

        if ($request->has('slider_image_c') && ($request->slider_image_c != '')) {
            $image_Path3 = $slider->image_c;
            if (File::exists($image_Path3)) {
                unlink($image_Path3);
                $slider->deleteImage(3);
            }
            $path3 = $request->slider_image_c->store('home/slider', 'public');
            $slider->image_c = $path3;
        }

        if ($request->has('slider_image_d') && ($request->slider_image_d != '')) {
            $image_Path4 = $slider->image_d;
            if (File::exists($image_Path4)) {
                unlink($image_Path4);
                $slider->deleteImage(4);
            }
            $path4 = $request->slider_image_d->store('home/slider', 'public');
            $slider->image_d = $path4;
        }

        if ($request->has('slider_image_e') && ($request->slider_image_e != '')) {
            $image_Path5 = $slider->image_e;
            if (File::exists($image_Path5)) {
                unlink($image_Path5);
                $slider->deleteImage(5);
            }
            $path5 = $request->slider_image_e->store('home/slider', 'public');
            $slider->image_e = $path5;
        }

        $slider->slider_title = $request->slider_title;
        $slider->slider_description = $request->slider_description;
        $slider->heading1 = $request->heading1;
        $slider->subheading1 = $request->subheading1;
        $slider->heading2 = $request->heading2;
        $slider->subheading2 = $request->subheading2;
        $slider->heading3 = $request->heading3;
        $slider->subheading3 = $request->subheading3;
        $slider->heading4 = $request->heading4;
        $slider->subheading4 = $request->subheading4;
        $slider->heading5 = $request->heading5;
        $slider->subheading5 = $request->subheading5;

        if ($request->has('is_active')) {
            //Checkbox checked
            $slider->is_active = 1;
        } else {
            //Checkbox not checked
            $slider->is_active = 0;
        }

        $slider->created_by = Auth::user()->id;
        $slider->save();
        Alert::success('Slider Updated successfully');
        return redirect()->route('admin.slider.index');
    }
}
