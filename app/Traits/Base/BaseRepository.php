<?php

namespace App\Traits\Base;

use App\Traits\Base\BaseInterface;
use Illuminate\Support\Facades\DB;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function index(){
        return $this->model->all();
    }

    public function find(int $modelId){
        return $this->model->findOrFail($modelId);
    }

    public function storeOrUpdate(array $requestsArr, int $modelId = null){
        return DB::transaction(function() use ($requestsArr, $modelId){
            if ($modelId) {
                $model = $this->model->find($modelId);
                $model->update($requestsArr);
            } else {
                $model = $this->model->create($requestsArr);
            }
            return $model;
        });
    }

    public function delete(int $modelId){
        $this->model->findOrFail($modelId)->delete();
    }
}
