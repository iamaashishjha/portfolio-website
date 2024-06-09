<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Models\User;
use App\Models\Permission;
use App\Models\AppSettings;
use App\Traits\Base\BaseAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


class PermissionsController extends BaseAdminController
{
    public $data;

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['appSetting'] = AppSettings::first();
        $this->data['authUser'] = User::find(Auth::id());
    }


    public function index()
    {
        $this->data['permissions'] = Permission::all();
        return view('ar.permission.index', $this->data);
    }

    public function generatePermissions()
    {
        Artisan::call('generate:permissions');
        return redirect()->back()->with('success', 'Permissions generated for all models.');
    }
}
