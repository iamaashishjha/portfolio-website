<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    //

     /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }


}
