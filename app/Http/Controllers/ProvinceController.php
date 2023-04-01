<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Traits\Base\BaseCrudController;
use Illuminate\Http\Request;

class ProvinceController extends BaseCrudController
{
    public function index()
    {
        $this->data['provinces'] = Province::all();
        return view('ar.appSetting.province', $this->data);
    }

    public function getProvince()
    {
        $provinces = Province::all();
        return response()->json($provinces);

    }
}
