<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeaderFooter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'header', 'logo', 'description', 
        'phone', 'email', 'address', 'footer', 
        'meta_description', 'meta_title', 'keywords',
        'created_by', 'is_active'
    ];

    public function getLogoAttribute()
    {
        $image = $this->logo;
        if ($image != NULL) {
            return '/storage/' . $image;
        }else{
            return null;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
