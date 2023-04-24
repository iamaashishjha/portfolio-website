<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Types extends BaseModel
{
    protected $table = 'types';

    const MOBILE = 1;
    const EMAIL = 2;
    const TEXT = 3;
    const FILE = 4;
    const LEADERSHIP = 5;

    public function getNameAttribute()
    {
        return $this->name_en.' ('.$this->name_lc.') ';
    }
}
