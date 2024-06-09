<?php

namespace App\Http\Controllers;

use App\Traits\Base\BaseAdminController;

class FallBackRouteController extends BaseAdminController
{
    public function __invoke()
    {
        abort(404);
    }
}
