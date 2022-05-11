<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provision extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code'
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.$this->name;
    }
}
