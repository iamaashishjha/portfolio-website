<?php

namespace App\Http\Controllers;

use App\Models\LocalLevel;
use Illuminate\Http\Request;

class LocalLevelController extends Controller
{
    public function index()
    {
        $this->data['localLevels'] = LocalLevel::all();
        return view('ar.appSetting.localLevel', $this->data);
    }

    public function getLocalLevel($id)
    {
        $localLeveltype = LocalLevel::where('district_id', $id)->get();
        return response()->json($localLeveltype);
    }
}