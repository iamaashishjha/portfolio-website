<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parliament extends BaseModel
{
    protected $table = 'content_pages';
    protected $attributes = [
        'type_id' => Types::PARLIAMENT,
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type_id', Types::PARLIAMENT)->orderBy('id', 'desc');
        });
    }

    // Define the getter method for the image attribute
    public function getImageAttribute($value)
    {
        return '/storage/' . $value;
    }

    // Define the setter method for the image attribute
    public function setImageAttribute($value)
    {
        $destinationPath = 'Parliament';
        $this->attributes['image'] = $value->store($destinationPath, 'public');
    }

        // Define the getter method for the image attribute
        public function getFileAttribute($value)
        {
            return '/storage/' . $value;
        }
    
        // Define the setter method for the image attribute
        public function setFileAttribute($value)
        {
            $destinationPath = 'Parliament';
            $this->attributes['file'] = $value->store($destinationPath, 'public');
        }
}
