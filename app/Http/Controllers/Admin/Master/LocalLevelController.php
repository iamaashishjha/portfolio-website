<?php

namespace App\Http\Controllers;

use App\Models\LocalLevel;
use App\Traits\Base\BaseAdminController;

class LocalLevelController extends BaseAdminController
{
    public function index()
    {
        $this->data['localLevels'] = LocalLevel::all();
        return view('ar.master-data.localLevel', $this->data);
    }
}
