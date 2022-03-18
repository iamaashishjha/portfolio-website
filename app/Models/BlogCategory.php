<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $fillable = [
        'title', 'description', 'category_image',
        'slug', 'meta_description', 'meta_title', 'user_id', 'keywords'
    ];

    protected $guarded = ['id'];
}
