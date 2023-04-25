<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Traits\Base\BaseCrudController;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public $data;
    public function index()
    {
        $this->data['provinces'] = Province::all();
        return view('ar.master-data.province', $this->data);
    }

    public function getProvince()
    {
        $provinces = Province::all();
        return response()->json($provinces);

    }
}
