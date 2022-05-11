<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'provision_id'
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.$this->name;
    }
}
