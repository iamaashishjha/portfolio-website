<?php

namespace App\Http\Controllers;


use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\User;
use App\Traits\Base\BaseCrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class UserDashboardController extends BaseCrudController
{
    public function index()
    {
        $userId = Auth::id();
        $this->data['users'] = User::all();
        $this->data['userCount'] = $this->data['users']->count();
        $this->data['categories'] = BlogCategory::active()->get();
        $this->data['catCount'] = $this->data['categories']->count();
        $this->data['tags'] = BlogTags::active()->get();
        $this->data['tagCount'] = $this->data['tags']->count();
        $this->data['post'] = BlogPost::active()->where('created_by', $userId)->get();
        $this->data['posts'] = BlogPost::active()->get();
        $this->data['postsCount'] = $this->data['posts']->count();
        $this->data['postCount'] =  $this->data['post']->count();
        return view('dashboard.index', $this->data);
    }

    public function profile($id)
    {
        $this->data['user'] = User::find($id);
        return view('dashboard.profile.index', $this->data);
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->designation = $request->designation;
        if ($request->has('profile_image') && ($request->profile_image != '')) {
            $imagePath = $user->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $user->deleteImage();
            }
            $path = $request->profile_image->store('users', 'public');
            $user->profile_image = $path;
        }

        $user->save();
        Alert::toast('Profile Updated Successfully', 'success');
        return redirect()->back();
    }

    public function changePassword($id)
    {
        $this->data['user'] = User::find($id);
        return view('auth.profile', $this->data);
    }
}
