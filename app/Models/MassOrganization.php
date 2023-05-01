<?php

namespace App\Models;

use App\Models\Types;
use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MassOrganization extends BaseModel
{
    protected $table = 'content_pages';
    protected $attributes = [
        'type_id' => Types::MASSORGANIZATION,
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type_id', Types::MASSORGANIZATION)->orderBy('id', 'desc');
        });
    }
}
