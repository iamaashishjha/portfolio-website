<?php

namespace App\Base;

use App\Traits\FileTrait;
use App\Models\AppSettings;
use App\Traits\IsActiveTrait;
use App\Traits\CheckPermission;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Repositories\AdminEloquentResourceRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseAdminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use CheckPermission, FileTrait, IsActiveTrait;

    protected $model, $repo, $context;
    public $data;
    
    /**
     * Instantiate
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->context = class_basename($model);
        $this->repo = new AdminEloquentResourceRepository($model);
        $this->data['appSetting'] = AppSettings::first();
    }
}
