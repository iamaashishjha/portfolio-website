<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class BlogTags extends BaseModel
{

    protected $table = 'blog_tags';

    protected $fillable = [
        'title', 'description', 'tag_image',
        'slug', 'meta_description', 'meta_title', 'keywords',
        'status', 'is_deleted', 'created_by', 'updated_by', 'deleted_by'
    ];

    protected $guarded = ['id'];


    public function checkStatus()
    {
        $status = $this->attributes['status'];
        if($status == 0){
            return '';
        }else{
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
        return '/storage/' . $this->tag_image;
    }

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class);
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
