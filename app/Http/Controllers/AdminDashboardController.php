<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends BaseController
{

    public function index()
    {
        return view('ar.index');
    }
}
