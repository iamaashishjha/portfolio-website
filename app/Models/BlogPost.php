<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'blog_posts';

    protected $fillable = [
        'title', 'description', 'content', 'alt_text', 'image', 'post_date', 'category_id',
        'status', 'featured', 'slug', 'meta_description', 'meta_title', 'user_id'
    ];

    protected $guarded = ['id'];
}
