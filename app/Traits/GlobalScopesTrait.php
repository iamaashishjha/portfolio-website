<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait GlobalScopesTrait
{
    public function scopeActive($query)
    {
        return $query->where('is_active', TRUE);
    }

    public function scopeIsActive($query)
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
}
