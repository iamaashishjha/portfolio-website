<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

trait GlobalRelationsEntityTrait
{
    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedByEntity()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deletedByEntity()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
