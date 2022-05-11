<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $this->data['districts'] = District::all();
        return view('ar.appSetting.district', $this->data);

    }
}
