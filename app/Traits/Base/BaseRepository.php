<?php

namespace App\Traits\Base;

use App\Traits\Base\BaseInterface;

class BaseRepository implements BaseInterface
{
    protected $model;

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

    public function delete(int $modelId){
        $this->model->findOrFail($modelId)->delete();
    }
}
