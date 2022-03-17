<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdminUserDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('auth.profile')->with('user', $user);
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $data['phone_number'] = $request->phone_number;
        $data['address'] = $request->address;
        $data['designation'] = $request->designation;

        if ($request->profile_image) {

            $path = $request->profile_image->store('users', 'public');
            # code...
            // $path = Storage::storeAs(
            //     'users',
            //     $request->file('profile_image'),
            //     $request->user()->id
            // );
            $data['profile_image'] = $path;
        }
        // dd($request->profile_image);
        $user->update($data);
        return redirect()->back();
    }
}
