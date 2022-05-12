<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'province_id','code','name_en','name_lc',
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.$this->name;
    }
}
