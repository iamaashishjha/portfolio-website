<?php

namespace App\Base;

interface BaseInterface
{
    public function index();
    public function find(int $modelId);
    public function storeOrUpdate(array $requestsArr, int $modelId);
    public function delete(int $modelId);
}
