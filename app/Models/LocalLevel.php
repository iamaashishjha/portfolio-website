<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'provision_id', 'district_id',
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
