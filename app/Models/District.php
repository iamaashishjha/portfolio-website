<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'province_id','code','name_en','name_lc',
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.($this->name_en).' ('.$this->name_lc.') ';
    }
}
