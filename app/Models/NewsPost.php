<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class NewsPost extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'news_posts';

    protected $fillable = [
        'title', 'description', 'content', 'alt_text', 'post_image', 'post_date', 'category_id',
        'status', 'featured', 'slug', 'meta_description', 'meta_title', 'user_id', 'keywords', 'views',
        'created_by', 'updated_by', 'deleted_by'
    ];

    protected $guarded = ['id'];

    public function checkStatus()
    {
        # code...
        $status = $this->attributes['status'];
        if ($status == 0) {
            return '';
        } else {
            return 'checked';
        }
    }

    public function checkFeatured()
    {
        # code...
        $featured = $this->attributes['featured'];
        if ($featured == 0) {
            return '';
        } else {
            return 'checked';
        }
    }

    public function getStatusAttribute()
    {
        $status = $this->attributes['status'];
        if ($status == 0) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-6' . '"> <i data-feather=' . '"check-square' . '" class="w-4 h-4 mr-2' . '"></i> Inactive </div>';
        } elseif ($status == 1) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-9' . '"> <i data-feather=' . '"check-square' . '" class="w-4 h-4 mr-2' . '"></i> Active </div>';
        } else {
            return 'NULL';
        }
    }

    public function getImageAttribute()
    {
        return '/storage/' . $this->post_image;
    }

    public function getTagsAttribute()
    {
        return $this->newsTags;
        // $tags = $this->newsTags;
        // foreach ($tags as $tag) {
        //     return '<button class=' . '"button w-24 shadow-md mr-1 mb-2 text-gray-700' . '">' . $tag->title . '</button>';
        // }
    }

    public function comments()
    {
        return $this->HasMany(NewsComment::class, 'news_id', 'id');
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function createdUser()
    {
        # code...
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updateUser()
    {
        # code...
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deleteUser()
    {
        # code...
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function category()
    {
        # code...
        return $this->belongsTo(NewsCategory::class, 'category_id', 'id');
    }

    public function newsTags()
    {
        # code...
        return $this->belongsToMany(NewsTags::class);
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function viewIncrement()
    {
        $view = $this->views;
        return $view++;
    }
}
