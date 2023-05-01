<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait IsActiveTrait
{
    public function getIsActive($request)
    {
        $status = false;
        if ($request->has('is_active')) {
            if ($request->is_active == 'on') {
                $status = true;
            }
        }
        return $status;
    }
}
