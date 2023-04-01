<?php

namespace App\Traits;

trait ScopeTrait{

    public function scopeActive($query)
    {
        return $query->where('status', TRUE);
    }

    public function scopeNotDeleted($query)
    {
        return $query->where('is_deleted', FALSE);
    }
}
