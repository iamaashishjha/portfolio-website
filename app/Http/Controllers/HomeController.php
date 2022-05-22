<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\HeaderFooter;
use App\Models\News;
use App\Models\Slider;

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
        $this->data['news'] = News::all();
        return view('hr.event.index', $this->data);
    }

    public function showNews($id)
    {
        $this->data['news'] = News::find($id);
        return view('hr.event.show');
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
