<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Data;
use App\Models\Event;
use App\Models\HeaderFooter;
use App\Models\News;
use App\Models\NewsPost;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['headerFooter'] = HeaderFooter::first();
        $this->data['sliders'] = Slider::first();
        $this->data['blogPosts'] = BlogPost::skip(0)->take(3)->get();
        $this->data['events'] = Event::all();
        return view('hr.index', $this->data);
    }

    public function indexPageSliderForm(Request $request)
    {

        // $validator = $request->validate(
        //     [
        //         'email' => 'required|email',
        //         'zip' => 'required|integer'
        //     ],
        //     [
        //         'email' => 'Email',
        //         'zip' > 'Zip Code',
        //     ],
        //     [
        //         'required' => 'The :attribute field is required.',
        //         'email' => 'The :attribute field must be email.',
        //         'integer' => 'The :attribute field must be number.',
        //     ]
        // );

        $validator =Validator::make($request->all(),
            [
                'email' => 'required|email',
                'zip' => 'required|integer'
            ],
            [
                'email' => 'Email',
                'zip' > 'Zip Code',
            ],
            [
                'required' => 'The :attribute field is required.',
                'email' => 'The :attribute field must be email.',
                'integer' => 'The :attribute field must be number.',
            ]
        );

        if (!is_array($validator) && $validator->fails()) {;
            $message = $validator->errors();
            Alert::error($message);
            return redirect()->back();
        }

        $data = new Data();
        $data->slider_subscribe_email = $request->email;
        $data->slider_subscribe_zip = $request->zip;
        $data->save();
        Alert::toast('We Will get back to you', 'success');
        return redirect()->back();
    }

    public function aboutUsPage()
    {
        $this->data['headerFooter'] = HeaderFooter::first();
        return view('hr.about', $this->data);
    }

    public function contactPage()
    {
        return view('hr.contact');
    }

    public function listBlog()
    {
        $this->data['blogs'] = BlogPost::all();
        return view('hr.blog.index', $this->data);
    }

    public function showBlog($id)
    {
        $this->data['blog'] = BlogPost::find($id);
        return view('hr.blog.show');
    }

    public function listNews()
    {
        $this->data['news'] = NewsPost::all();
        return view('hr.news.index', $this->data);
    }

    public function showNews($id)
    {
        $this->data['news'] = NewsPost::find($id);
        return view('hr.news.show');
    }

    public function listEvent()
    {
        $this->data['events'] = Event::all();
        return view('hr.event.index', $this->data);
    }

    public function showEvent($id)
    {
        $this->data['event'] = Event::find($id);
        return view('hr.event.show');
    }
}
