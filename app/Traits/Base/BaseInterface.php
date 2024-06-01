<?php

namespace App\Traits\Base;

interface BaseInterface
{
    public function index();
    public function storeOrUpdate($requestsArr, int $modelId);
    public function delete(int $modelId);
}
