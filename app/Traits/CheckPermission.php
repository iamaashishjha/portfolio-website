<?php

namespace App\Traits;

use App\Models\User;
use ReflectionClass;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait CheckPermission
{
    public function checkPermission($method)
    {
        $reflection = new ReflectionClass($this->model);
        $user = User::find(Auth::id());
        $permission = $user->hasPermissionTo($method . ' ' . Str::lower($reflection->getShortName()));
        if ($permission) {
            return;
        } else {
            abort(403);
        }
    }
}
