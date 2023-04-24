<?php

namespace App\Traits\Base;

use App\Models\AppSettings;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;
use App\Traits\FileTrait;

class BaseCrudController extends Controller
{
    use CheckPermission;
    use FileTrait;
    public $data;

     /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->data['appSetting'] = AppSettings::first();
    }
}
