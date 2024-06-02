<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AppSettings extends BaseModel
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

    public function setSiteTitleImageAttribute($value){
        $destinationPath = 'App-Setttings';
        $this->attributes['site_title_image'] = $value->store($destinationPath, 'public');
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
