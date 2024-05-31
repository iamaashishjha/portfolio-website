<?php

namespace App\Traits\Base;

use App\Traits\Base\BaseInterface;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function index(){
        // dd('index base repo');
        return $this->model->all();
    }

    public function create(){

    }

    public function store(){

    }
    
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }
}
