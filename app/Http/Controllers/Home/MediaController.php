<?php

namespace App\Http\Controllers\Home;

use App\Models\Event;
use App\Models\Saying;
use App\Models\Thought;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\Document;
use App\Models\NewsPost;
use App\Models\NewsTags;
use App\Models\AppSettings;
use App\Models\NewsComment;
use App\Models\BlogCategory;
use App\Models\BlogsComment;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\CompanyDetails;
use App\Traits\Base\BaseHomeController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MediaController extends BaseHomeController
{
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


    public function listThought()
    {
        $this->data['thoughts'] = Thought::paginate(5);
        return view('customHome.thought.index', $this->data);
    }

    public function showThought($id)
    {
        $this->data['thoughts'] = Thought::find($id);
        return view('customHome.thought.show', $this->data);
    }

    public function listSaying()
    {
        $this->data['sayings'] = Saying::paginate(15);
        return view('customHome.saying.index', $this->data);
    }

    public function showSaying($id)
    {
        $this->data['saying'] = Saying::find($id);
        return view('customHome.saying.show', $this->data);
    }
}
