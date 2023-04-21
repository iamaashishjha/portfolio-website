<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Traits\Base\BaseCrudController;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public $data;
    public function index()
    {
        $this->data['districts'] = District::all();
        return view('ar.appSetting.district', $this->data);
    }

    public function getDistrict($id)
    {
        $district = District::where('province_id',$id)->get();
    return response()->json($district);
    }
}
