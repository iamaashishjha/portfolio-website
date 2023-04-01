<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Traits\Base\BaseCrudController;
use Illuminate\Http\Request;

class GenderController extends BaseCrudController
{
    public function index()
    {
        $this->data['genders'] = Gender::all();
    }
}
