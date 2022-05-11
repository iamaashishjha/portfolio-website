<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    

    use HasFactory;

    protected $table = 'memberships';

    protected $fillable = [
        'name_en', 'name_lc', 'content', 'alt_text', 'post_image', 'post_date', 'category_id',
        'status', 'featured', 'slug', 'meta_description', 'meta_title', 'user_id', 'keywords', 'views'
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
        # code...
        $tags = $this->blogTags;
        foreach ($tags as $tag) {
            # code...
            return '<button class=' . '"button w-24 shadow-md mr-1 mb-2 text-gray-700' . '">' . $tag->title . '</button>';
        }
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        # code...
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function blogTags()
    {
        # code...
        return $this->belongsToMany(BlogTags::class);
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
