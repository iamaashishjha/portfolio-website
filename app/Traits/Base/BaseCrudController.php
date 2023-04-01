<?php

namespace App\Traits\Base;

use App\Models\AppSettings;
use App\Http\Controllers\Controller;
use App\Traits\checkPermission;

class BaseCrudController extends Controller
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
    }


}
