<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeaderFooter extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title','name', 'logo', 
        'telephone', 'email', 'address', 'company_description',
        'meta_description', 'meta_title', 'keywords',
        'created_by', 'is_active', 'start_date',
        'phone1', 'phone2', 
    ];

    public function getLogoImageAttribute()
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
