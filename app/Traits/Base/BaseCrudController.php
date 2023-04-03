<?php

namespace App\Traits\Base;

use App\Models\AppSettings;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;

class BaseCrudController extends Controller
{
    use CheckPermission;
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
