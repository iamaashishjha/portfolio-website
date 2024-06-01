<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AdminEloquentResourceInterface;
use App\Traits\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class AdminEloquentResourceRepository extends BaseRepository implements AdminEloquentResourceInterface
{
    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index(){
        return $this->model->all();
    }

    public function storeOrUpdate($requestsArr, $modelId = null){
        if ($modelId) {
            $this->model->find($modelId);
        } else {
            $this->model->create($requestsArr);
        }
    }
}
