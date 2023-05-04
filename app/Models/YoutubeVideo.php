<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Builder;

class YoutubeVideo extends BaseModel
{
    // protected $table = 'youtube_videos';
    protected $table = 'online_videos';
    protected $attributes = [
        'type_id' => Types::YOUTUBEVIDEO,
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->where('type_id', Types::YOUTUBEVIDEO)->orderBy('id', 'desc');
        });
    }


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
