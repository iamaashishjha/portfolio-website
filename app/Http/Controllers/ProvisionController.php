<?php

namespace App\Http\Controllers;

use App\Models\Provision;
use Illuminate\Http\Request;

class ProvisionController extends Controller
{
    public function index()
    {
        $this->data['provisions'] = Provision::all();
        return view('ar.appSetting.provision', $this->data);
    }
}
