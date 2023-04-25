<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BulkMessage extends BaseModel
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'medium' => 'array',
        'members' => 'array',
    ];

    public function getImageAttribute()
    {
        if (isset($this->file)) {
            return '/storage/' . $this->file;
        }else{
            return null;
        }
    }

    public function deleteFile()
    {
        Storage::delete($this->file);
    }
}
