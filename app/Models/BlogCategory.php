<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $fillable = [
        'title', 'description', 'category_image',
        'slug', 'meta_description', 'meta_title', 'keywords',
        'status', 'is_deleted', 'created_by', 'updated_by',
        'deleted_by'
    ];

    protected $guarded = ['id'];


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


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
        return '/storage/' . $this->category_image;
    }

    public function posts()
    {
        # code...
        return $this->hasMany(BlogPost::class, 'category_id', 'id');
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
