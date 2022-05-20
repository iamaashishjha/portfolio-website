<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    protected $guarded = ['id'];
    protected $fillable = [
        'code','name_en','name_lc',
    ];

    public function getNameAttribute()
    {
        return $this->code.' - '.($this->name_en).' ('.$this->name_lc.') ';
    }
}
