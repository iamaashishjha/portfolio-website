<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Traits\Base\BaseAdminController;

class DistrictController extends BaseAdminController
{
    public function index()
    {
        $this->data['districts'] = District::all();
        return view('ar.master-data.district', $this->data);
    }
}
