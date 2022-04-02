<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdminUserDetailController extends BaseController
{

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
