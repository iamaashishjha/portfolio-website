<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreEventRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateEventRequest;
use App\Traits\Base\BaseAdminController;

class AdminEventController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = Event::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['events'] = $this->model::notDeleted()->get();
        return view('ar.event.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.event.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $this->checkPermission('create');
        $path = $request->event_image->store('events', 'public');
        $event = new $this->model();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->venue = $request->venue;
        $event->start_date_time = $request->start_date_time;
        $event->location_map = $request->location_map;
        $event->event_image = $path;
        $event->meta_description = $request->meta_description;
        $event->meta_title = $request->meta_title;
        $event->slug = $request->slug;

        if ($request->has('status')) {
            //Checkbox checked
            $event->status = 1;
        } else {
            //Checkbox not checked
            $event->status = 0;
        }

        $event->keywords = $request->keywords;
        $event->created_by = Auth::user()->id;
        $event->save();

        Alert::toast('Event Created Successfully', 'success');
        // alert()->success('Success Message', 'Category Created Successfully');
        return redirect()->route('admin.event.index');
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
        $this->data['event'] = $this->model::find($id);
        return view('ar.event.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $this->checkPermission('update');
        $event = $this->model::find($id);

        // $event->title = $request->title;
        $event->description = $request->description;

        if ($request->has('event_image') && ($request->event_image != '')) {

            $imagePath = $event->image;

            if (File::exists($imagePath)) {
                unlink($imagePath);
                $event->deleteImage();
            }

            $path = $request->event_image->store('events', 'public');
            $event->event_image = $path;
        }

        if ($request->has('status')) {
            $event->status = 1;
        } else {
            $event->status = 0;
        }

        $event->venue = $request->venue;
        $event->start_date_time = $request->start_date_time;
        $event->location_map = $request->location_map;

        $event->meta_description = $request->meta_description;
        $event->meta_title = $request->meta_title;
        $event->slug = $request->slug;

        $event->keywords = $request->keywords;
        $event->updated_by = Auth::user()->id;
        $event->updated_at = now();

        $event->save();
        Alert::success('Event Updated Successfully')->flash();
        return redirect()->route('admin.event.index');

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
        $event = $this->model::find($id);
        $imagePath = $event->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $event->deleteImage();
            }

            $event->delete();
            Alert::toast('Even Deleted Successfully', 'success');
            return redirect()->back();

    }
}
