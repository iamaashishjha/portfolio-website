<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMember extends BaseModel
{
    protected $table = 'team_members';
    // protected $attributes = [
    //     'type_id' => Types::HISTORY,
    // ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->orderBy('display_order', 'ASC');
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
        $destinationPath = 'Team-Members';
        $this->attributes['image'] = $value->store($destinationPath, 'public');
    }

    public function postsEntity()
    {
        return $this->belongsTo(Types::class, 'post_id', 'id');
    }

    public function committeeEntity()
    {
        return $this->belongsTo(Committee::class, 'type_id', 'id');
    }
}
