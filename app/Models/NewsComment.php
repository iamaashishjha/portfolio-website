<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
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
