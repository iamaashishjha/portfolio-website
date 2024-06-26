<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\StoreUserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\UpdateUserRequest;
use App\Traits\Base\BaseAdminController;

class UserController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = User::class;
    }

    public function index()
    {
        $this->checkPermission('list');
        $this->data['users'] = $this->model::all();
        return view('ar.user.index', $this->data);
    }

    public function create()
    {
        $this->checkPermission('create');
        $this->data['roles'] = Role::all();
        return view('ar.user.form', $this->data);
    }

    public function store(StoreUserRequest $request)
    {
        $this->checkPermission('create');
        if($request->file('image_path')){
            $path = $request->file('image_path')->store('users/', 'public');
        }else{
            $path = null;
        }
        $user = new $this->model();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_image = $path;
        $user->save();
        if($request->role){
            $role = Role::find($request->role);
            $user->assignRole($role);
        }
        return redirect()->route('admin.user.index')->with('successMessage', 'User Created Successfully');
    }


    public function edit($id)
    {
        $this->checkPermission('update');
        $this->data['user'] = $this->model::find($id);
        $this->data['roles'] = Role::all();
        return view('ar.user.form', $this->data);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->checkPermission('update');
        // if($request->file('image_path')){
        //     $path = $request->file('image_path')->store('users/', 'public');
        // }else{
        //     $path = null;
        // }
        $user = $this->model::find($id);

        if ($request->password == null) {
            $password = Hash::make($request->password);
        }else{
            $password = $user->password;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;
        $user->save();
        if($request->role){
            $user->assignRoleCustom($request->role, $user->id);
        }
        $user->assignRoleCustom($request->role, $user->id);
        return redirect()->route('admin.user.index')->with('successMessage', 'User Updated Successfully');
    }

    public function registeredUsers()
    {
        $this->data['users'] = $this->model::where('role', 0)->get();
        return view('ar.user.registered', $this->data);
    }

    public function adminUsers()
    {
        $this->data['users'] = $this->model::where('role', 1)->get();
        return view('ar.user.admin', $this->data);
    }

    // public function makeAdmin($id)
    // {
    //     $user = $this->model::find($id);
    //     $user->role = 1;
    //     $user->save();
    //     Alert::toast('User has been made admin', 'success');
    //     return redirect()->back();
    // }

    // public function removeAdmin($id)
    // {
    //     $user = $this->model::find($id);
    //     if ($user->id === 1) {
    //         Alert::error('User cannot be removed from Admin');
    //         return redirect()->back();
    //     } elseif(($user->catCount() > 0) || ($user->tagCount() > 0) ){
    //         Alert::error('User cannot be removed from Admin. User has Created Categories/Tags. Delete them before removing user from admin.');
    //         return redirect()->back();
    //     }else {
    //         $user->role = 0;
    //         $user->save();
    //         Alert::toast('User removed from admin', 'success');
    //         return redirect()->back();
    //     }
    // }

    public function destroy($id)
    {
        $this->checkPermission('delete');
        $user = $this->model::find($id);

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
        // $this->data['authUser'] = User::find(Auth::id());
        $this->data['user'] = $this->model::find($id);
        return view('auth.profile', $this->data);
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = $this->model::find($id);
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
        $this->data['user'] = $this->model::find($id);

        return view('auth.profile', $this->data);
        // return view('auth.profile', $this->data)->withFragment('changePasswordContent');

    }

    public function changePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ],
            [
                'email' => 'Email',
                'password' => 'Password',
            ]
        );

        if (!is_array($validator) && $validator->fails()) {;
            $message = $validator->errors();
            Alert::error($message);
            return redirect()->back();
        }
        $user = $this->model::find($id);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Alert::success('Credentials changed successfully');
        return redirect()->back();
    }
}
