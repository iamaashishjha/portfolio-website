<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function registeredUsers()
    {
        # code...
        $users = User::where('admin', 0)->get();
        return view('ar.user.registered')
        ->with('users', $users);
    }

    public function adminUsers()
    {
        $users = User::where('admin', 1)->get();
        return view('ar.user.admin')
        ->with('users', $users);
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
            $data['profile_image'] = $path;
        }
        $user->update($data);
        return redirect()->back();
    }
}
