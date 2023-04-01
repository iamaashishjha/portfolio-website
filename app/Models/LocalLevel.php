<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalLevel extends BaseModel
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = [
        'district_id','code','name_en','name_lc',
        'level_type_id','wards_count',
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.($this->name_en).' ('.$this->name_lc.') ';
    }

    public function localLevelType()
    {
        return $this->belongsTo(LocalLevelType::class, 'level_type_id', 'id');
    }

    // public function provision()
    // {
    //     return $this->belongsTo(Provision::class, 'provision_id', 'id');
    // }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
