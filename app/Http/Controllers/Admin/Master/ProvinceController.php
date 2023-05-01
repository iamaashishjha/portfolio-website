<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Traits\Base\BaseAdminController;

class ProvinceController extends BaseAdminController
{
    public function index()
    {
        $this->data['provinces'] = Province::all();
        return view('ar.master-data.province', $this->data);
    }

}
