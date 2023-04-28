<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leadership extends BaseModel
{
    protected $table = 'commitees';
    protected $attributes = [
        'type_id' => Types::LEADERSHIP,
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type_id', Types::LEADERSHIP)->orderBy('id', 'desc');
        });
    }

    public function teamMembersEntity()
    {
        return $this->hasMany(TeamMember::class, 'committee_id', 'id');
    }
}
