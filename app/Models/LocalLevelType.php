<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalLevelType extends BaseModel
{

    public function getNameAttribute()
    {
        return $this->code.' - '.($this->name_en).' ('.$this->name_lc.') ';
    }


}
