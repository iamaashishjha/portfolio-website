<?php

namespace App\Traits\Base;

use App\Traits\FileTrait;
use App\Models\AppSettings;
use App\Traits\IsActiveTrait;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;

class BaseAdminController extends Controller
{
    use CheckPermission;
    use FileTrait, IsActiveTrait;
    public $data;

     /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->data['appSetting'] = AppSettings::first();
    }
}
