<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AppSettings;
use Illuminate\Http\Request;
use App\Traits\checkPermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    use checkPermission;


    public $data;

     /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
        $this->data['appSetting'] = AppSettings::first();
        // $this->data['authUser'] = User::find(Auth::id());
    }


}
