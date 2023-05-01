<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Traits\Base\BaseAdminController;

class GenderController extends BaseAdminController
{
    public function index()
    {
        $this->data['genders'] = Gender::all();
    }
}
