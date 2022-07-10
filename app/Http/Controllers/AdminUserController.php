<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use GrahamCampbell\ResultType\Success;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\BaseController;

class AdminUserController extends BaseController
{
    public function registeredUsers()
    {
        $users = User::where('role', 0)->get();
        return view('ar.user.registered')
            ->with('users', $users);
    }

    public function adminUsers()
    {
        $users = User::where('role', 1)->get();
        return view('ar.user.admin')
            ->with('users', $users);
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->role = 1;
        $user->save();
        Alert::toast('User has been made admin', 'success');
        return redirect()->back();
    }

    public function removeAdmin($id)
    {
        $user = User::find($id);
        if ($user->id === 1) {
            Alert::error('User cannot be removed from Admin');
            return redirect()->back();
        } elseif(($user->catCount() > 0) || ($user->tagCount() > 0) ){
            Alert::error('User cannot be removed from Admin. User has Created Categories/Tags. Delete them before removing user from admin.');
            return redirect()->back();
        }else {
            $user->role = 0;
            $user->save();
            Alert::toast('User removed from admin', 'success');
            return redirect()->back();
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user->id === 1) {
            Alert::toast('User cannot be Deleted.', 'error');
            return redirect()->back();
        }
        elseif(($user->catCount() > 0) || ($user->tagCount() > 0) ){
            Alert::error('User cannot be deleted. User has Created Categories/Tags. Delete them before deleting user.');
            return redirect()->back();
        }elseif($user->id == Auth::user()->id){
            Alert::toast('User cannot Delete itself.', 'error');
            return redirect()->back();
        }else {
            $imagePath = $user->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $user->deleteImage();
            }
            $user->delete();
            Alert::toast('User has been deleted.', 'success');
            return redirect()->back();
        }
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('auth.profile')->with('user', $user);
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

    public function changePasswordform($id)
    {
        $user = User::find($id);
        return view('auth.profile')->with('user', $user);
    }

    public function changePassword(Request $request, $id)
    {

        // dd($request);
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|confirmed',
                // 'contact_us_message' => 'required',
            ],
            [
                'email' => 'Email',
                'password' => 'Password',
            ],
            // [
            //     'required' => 'The :attribute field is required.',
            //     'string' => 'The :attribute field must be string.',
            //     'email' => 'The :attribute field must be email.',
            //     // 'email' => 'The :attribute field must be email.',
            // ]
        );

        if (!is_array($validator) && $validator->fails()) {;
            $message = $validator->errors();
            Alert::error($message);
            return redirect()->back();
        }
        $user = User::find($id);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Alert::success('Credentials changed successfully');
        return redirect()->back();
    }
}
