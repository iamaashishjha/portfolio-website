<?php

namespace App\Traits;

trait FileTrait{

    public function scopeActive($query)
    {
        return $query->where('status', TRUE);
    }

    public function scopeNotDeleted($query)
    {
        return $query->where('is_deleted', FALSE);
    }
}
