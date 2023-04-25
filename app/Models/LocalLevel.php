<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalLevel extends BaseModel
{

    public function getNameAttribute()
    {
        return $this->code.' - '.($this->name_en).' ('.$this->name_lc.') ';
    }

    public function localLevelType()
    {
        return $this->belongsTo(LocalLevelType::class, 'level_type_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
