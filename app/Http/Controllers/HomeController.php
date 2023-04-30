<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Library;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
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

    public function listVideos()
    {
        $this->data['youtubeVideos'] = YoutubeVideo::orderBy('created_at', 'DESC')->get();
        return view('customHome.video.index', $this->data);
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
