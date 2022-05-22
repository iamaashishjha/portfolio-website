<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\BaseController;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class UserDashboardController extends BaseController
{
    public function index()
    {
        $user = Auth::user()->id;
        $users = User::all();
        $userCount = $users->count();
        $categories = BlogCategory::where('status', 1)->get();
        $catCount = $categories->count();
        $tags = BlogTags::where('status', 1)->get();
        $tagCount = $tags->count();
        $post = BlogPost::where('status', 1)->where('created_by', $user)->get();
        $posts = BlogPost::where('status', 1)->get();
        $postsCount = $posts->count();
        $postCount = $post->count();
        // return view('ur.index')
        return view('dashboard.index')
        ->with('userCount', $userCount)
        ->with('catCount', $catCount)
        ->with('tagCount', $tagCount)
        ->with('postCount', $postCount)
        ->with('postsCount', $postsCount);
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('dashboard.profile.index')->with('user', $user);
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
        $user = User::find($id);
        return view('auth.profile')->with('user', $user);
    }
}
