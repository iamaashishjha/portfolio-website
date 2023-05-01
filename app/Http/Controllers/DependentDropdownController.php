<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\LocalLevel;
use Illuminate\Http\Request;

class DependentDropdownController extends Controller
{
    public $data;

    public function getProvince()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }

    public function getDistrict($id)
    {
        $district = District::where('province_id', $id)->get();
        return response()->json($district);
    }

    public function getLocalLevel($id)
    {
        $localLeveltype = LocalLevel::where('district_id', $id)->get();
        return response()->json($localLeveltype);
    }

    public function getLocalLevelType($id)
    {
        $localLevel = LocalLevel::find($id);
        $localleveltype = $localLevel->localLevelType;
        return response()->json($localleveltype);
    }
}
