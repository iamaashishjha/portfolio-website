<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalLevel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'district_id','code','name_en','name_lc',
        'level_type_id','wards_count',
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.$this->name;
    }

    public function provision()
    {
        return $this->belongsTo(Provision::class, 'provision_id', 'id');
    }
}
