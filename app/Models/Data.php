<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends BaseModel
{
    use HasFactory;

    protected $table = 'data';

    protected $fillable = [
        'slider_subscribe_email',
        'slider_subscribe_zip',
        'subscribe_us_email',
        'contact_us_name',
        'contact_us_email',
        'contact_us_message',
    ];

}
