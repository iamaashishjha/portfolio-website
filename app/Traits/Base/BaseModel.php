<?php

namespace App\Traits\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('status', TRUE);
    }

    public function scopeDeleted($query)
    {
        return $query->where('is_deleted', TRUE);
    }

    public function scopeNotDeleted($query)
    {
        return $query->where('is_deleted', FALSE);
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

}
