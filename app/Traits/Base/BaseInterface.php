<?php

namespace App\Traits\Base;

interface BaseInterface
{
    public function index();
    public function create();
    public function store();
    public function edit();
    public function update();
    public function destroy();
}
