<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalLevelType extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = [
        'code','name_en','name_lc',
        'local_level_count',
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.($this->name_en).' ('.$this->name_lc.') ';
    }

    
}
