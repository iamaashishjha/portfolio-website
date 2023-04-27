<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Support\Facades\Storage;

class Thought extends BaseModel
{
    protected $table = 'thoughts';

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
