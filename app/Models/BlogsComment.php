<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsComment extends BaseModel
{
    use HasFactory;

    protected $table = 'blogs_comments';

    protected $fillable = [
        'name', 'email', 'message', 'post_id',
        'created_at'
    ];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class, 'post_id', 'id');
    }
}
