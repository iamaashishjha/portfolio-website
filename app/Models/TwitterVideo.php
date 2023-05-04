<?php

namespace App\Models;

use App\Traits\Base\BaseModel;

class TwitterVideo extends BaseModel
{
    protected $table = 'twitter_videos';

    public function getStatusAttribute()
    {
        $status = $this->attributes['is_active'];
        if ($status == 0) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-6' . '"> <i data-feather=' . '"check-square' . '" class="w-4 h-4 mr-2' . '"></i> Inactive </div>';
        } elseif ($status == 1) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-9' . '"> <i data-feather=' . '"check-square' . '" class="w-4 h-4 mr-2' . '"></i> Active </div>';
        } else {
            return 'NULL';
        }
    }

    public function setIframeAttribute($value)
    {
        $this->attributes['iframe'] = str_replace('width="560"', 'width="100%"', $value);
    }
}
