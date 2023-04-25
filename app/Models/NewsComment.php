<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends BaseModel
{

    protected $table = 'news_comments';

    public function newsPost()
    {
        return $this->belongsTo(NewsPost::class, 'news_id', 'id');
    }
}
