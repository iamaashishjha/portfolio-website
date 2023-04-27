<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Builder;

class Committee extends BaseModel
{
    protected $table = 'commitees';
    protected $attributes = [
        'type_id' => Types::COMMITTEE,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'members' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type_id', Types::COMMITTEE)->orderBy('id', 'desc');
        });
    }

    public function teamMembersEntity()
    {
        return $this->hasMany(TeamMember::class, 'committee_id', 'id');
    }
}
