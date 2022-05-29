<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AppSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title', 'site_title_image',
        'meta_description', 'meta_title', 'keywords',
        'created_by', 'updated_by'
    ];

    public function getImageAttribute()
    {
        $image = $this->site_title_image;
        if ($image != NULL) {
            return '/storage/' . $image;
        }else{
            return null;
        }
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deleteImage()
    {
        Storage::delete($this->site_title_image);
    }
}
