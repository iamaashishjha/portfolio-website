<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    
    protected $table = 'data';
    
    protected $fillable = [
        'slider_subscribe_email',
        'slider_subscribe_zip'
    ];

}
