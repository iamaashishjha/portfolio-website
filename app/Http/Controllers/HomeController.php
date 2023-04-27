<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\News;
use App\Models\Event;
use App\Models\Slider;
use App\Models\Library;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\Document;
use App\Models\NewsPost;
use App\Models\NewsTags;
use App\Models\AppSettings;
use App\Models\NewsComment;
use App\Models\BlogCategory;
use App\Models\BlogsComment;
use App\Models\Committee;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\CompanyDetails;
use App\Models\History;
use App\Models\YoutubeVideo;
use App\Traits\Base\BaseHomeController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class HomeController extends BaseHomeController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('customHome.index', $this->data);
    }

    public function indexPageSliderForm(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
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

    public function indexPageSubscribeUsForm(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ],
            [
                'email' => 'Email',
            ],
            [
                'required' => 'The :attribute field is required.',
                'email' => 'The :attribute field must be email.',
            ]
        );

        if (!is_array($validator) && $validator->fails()) {;
            $message = $validator->errors();
            Alert::error($message);
            return redirect()->back();
        }

        $data = new Data();
        $data->subscribe_us_email = $request->subscribe_us_email;
        $data->save();
        Alert::toast('We Will get back to you', 'success');
        return redirect()->back();
    }

    public function aboutUsPage()
    {
        return view('customHome.about', $this->data);
    }

    public function donationPage()
    {
        return view('customHome.donation', $this->data);
    }


    public function contactPage()
    {
        return view('customHome.contact',  $this->data);
    }

    public function storeContactData(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'contact_us_name' => 'required|string',
                'contact_us_email' => 'required|email',
                'contact_us_message' => 'required',
            ],
            [
                'contact_us_name' => 'Name',
                'contact_us_email' => 'Email',
                'contact_us_message' => 'Message',
            ],
            [
                'required' => 'The :attribute field is required.',
                'string' => 'The :attribute field must be string.',
                'email' => 'The :attribute field must be email.',
            ]
        );

        if (!is_array($validator) && $validator->fails()) {;
            $message = $validator->errors();
            Alert::error($message);
            return redirect()->back();
        }
        $data = new Data();
        $data->contact_us_name = $request->contact_us_name;
        $data->contact_us_email = $request->contact_us_email;
        $data->contact_us_message = $request->contact_us_message;
        $data->save();
        Alert::toast('We Will get back to you', 'success');
        return redirect()->back();
    }

    public function listBlog()
    {
        $this->data['blogs'] = BlogPost::paginate(10);
        return view('customHome.blog.index', $this->data);
    }

    public function showBlog($id)
    {
        $this->data['blog'] = BlogPost::find($id);
        $this->data['blogTags'] = BlogTags::where('status', 1)->get();
        $this->data['blogCategories'] = BlogCategory::where('status', 1)->get();
        $this->data['latestBlogs'] = BlogPost::orderBy('id', 'DESC')->skip(0)->take(2)->get();
        $this->data['comments'] = BlogsComment::where('post_id', $id)->get();

        $this->data['blog']->viewIncrement();

        return view('customHome.blog.show', $this->data);
    }

    public function listCategoryBlogs($id)
    {
        $this->data['appSetting'] = AppSettings::first();
        $this->data['companyDetails'] = CompanyDetails::first();
        $this->data['documents'] = Document::all();

        $this->data['footerNews'] = NewsPost::skip(1)->take(2)->orderBy('id', 'ASC')->get();
        $this->data['blogs'] = BlogPost::where('category_id', $id)->paginate(10);

        return view('customHome.blog.index', $this->data);
    }

    // public function listTagsBlogs($id)
    // {
    //     $this->data['appSetting'] = AppSettings::first();
    //     $this->data['companyDetails'] = CompanyDetails::first();
    //     $this->data['footerNews'] = NewsPost::skip(1)->take(2)->orderBy('id', 'ASC')->get();
    //     $this->data['blogs'] = BlogPost::where('')->paginate(10);
    //     return view('customHome.blogs.index', $this->data);
    // }

    public function storeBlogComments(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required',
                'message' => 'required',
            ],
            [
                'name' => 'Name',
                'email' => 'Email',
                'message' => 'Message',
            ],
            [
                'required' => 'The :attribute field is required.',
                'string' => 'The :attribute field must be string.',
                'email' => 'The :attribute field must be email.',
            ]
        );

        if (!is_array($validator) && $validator->fails()) {;
            $message = $validator->errors();
            Alert::error($message);
            return redirect()->back();
        }

        $comment = new BlogsComment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->post_id = $id;
        $comment->save();
        Alert::toast('We Will get back to you', 'success');
        return redirect()->back();
    }

    public function listNews()
    {
        $this->data['news'] = NewsPost::paginate(10);
        return view('customHome.news.index', $this->data);
    }

    public function showNews($id)
    {
        $this->data['news'] = NewsPost::find($id);
        $this->data['newsTags'] = NewsTags::where('status', 1)->get();
        $this->data['newsCategories'] = NewsCategory::where('status', 1)->get();
        $this->data['latestNews'] = NewsPost::orderBy('id', 'DESC')->skip(0)->take(5)->get();
        return view('customHome.news.show', $this->data);
    }

    public function listCategoryNews($id)
    {
        $this->data['footerNews'] = NewsPost::skip(1)->take(2)->orderBy('id', 'ASC')->get();
        $this->data['news'] = NewsPost::where('category_id', $id)->paginate(10);

        return view('customHome.news.index', $this->data);
    }

    // public function listTagsNews($id)
    // {
    //     $this->data['appSetting'] = AppSettings::first();
    //     $this->data['companyDetails'] = CompanyDetails::first();
    //     $this->data['footerNews'] = NewsPost::skip(1)->take(2)->orderBy('id', 'ASC')->get();
    //     $this->data['news'] = NewsPost::where('')->paginate(10);
    //     return view('customHome.news.index', $this->data);
    // }

    public function storeNewsComments(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required',
                'message' => 'required',
            ],
            [
                'name' => 'Name',
                'email' => 'Email',
                'message' => 'Message',
            ],
            [
                'required' => 'The :attribute field is required.',
                'string' => 'The :attribute field must be string.',
                'email' => 'The :attribute field must be email.',
            ]
        );

        if (!is_array($validator) && $validator->fails()) {;
            $message = $validator->errors();
            Alert::error($message);
            return redirect()->back();
        }

        $comment = new NewsComment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->news_id = $id;
        $comment->save();
        Alert::toast('Commented Successfully', 'success');
        return redirect()->back();
    }

    public function listHistory()
    {
        $this->data['histories'] = History::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.history.index', $this->data);
    }

    public function showHistory($id)
    {
        $this->data['history'] = History::find($id);
        return view('customHome.history.show', $this->data);
    }

    public function listEvent()
    {
        $this->data['footerNews'] = NewsPost::skip(1)->take(2)->orderBy('id', 'ASC')->get();
        $this->data['events'] = Event::paginate(5);
        return view('customHome.event.index', $this->data);
    }

    public function showEvent($id)
    {
        $this->data['appSetting'] = AppSettings::first();
        $this->data['documents'] = Document::all();

        $this->data['companyDetails'] = CompanyDetails::first();
        $this->data['footerNews'] = NewsPost::skip(1)->take(2)->orderBy('id', 'ASC')->get();
        $this->data['event'] = Event::find($id);
        return view('customHome.event.show', $this->data);
    }

    public function listVideos()
    {
        return view('customHome.video.index', $this->data);
    }

    public function listCommittee()
    {
        return view('customHome.committee.index', $this->data);
    }

    public function showCommittee($id)
    {
        $this->data['committee'] = Committee::find($id);
        return view('customHome.committee.show', $this->data);
    }

    public function listLibrary()
    {
        $this->data['libraries'] = Library::paginate(5);
        return view('customHome.library.index', $this->data);
    }

    public function notFound()
    {
        abort(404);
    }
}
