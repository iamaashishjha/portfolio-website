<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends BaseModel
{
    use HasFactory;

    protected $table = 'news_comments';

    protected $fillable = [
        'name', 'email', 'message', 'post_id',
        'created_at'
    ];

    public function newsPost()
    {
        return $this->belongsTo(NewsPost::class, 'news_id', 'id');
    }
}
