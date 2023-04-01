<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends BaseModel
{
    use HasFactory;

    protected $table = 'libraries';

    protected $gaurded = ['id'];

    public function getImageAttribute()
    {
        return '/storage/' . $this->doc_image;
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function getFileAttribute()
    {
        return '/storage/' . $this->doc_file;
    }

    public function deleteFile()
    {
        Storage::delete($this->doc_file);
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
