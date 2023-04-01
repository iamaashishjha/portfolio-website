<?php

namespace App\Http\Controllers;

use App\Models\LocalLevel;
use App\Models\LocalLevelType;
use App\Traits\Base\BaseCrudController;
use Illuminate\Http\Request;

class LocalLeveTypeController extends BaseCrudController
{
    //
    public function getLocalLevelType($id)
    {
        $localLevel = LocalLevel::find($id);
        $localleveltype = $localLevel->localLevelType;
        return response()->json($localleveltype);
    }
}
