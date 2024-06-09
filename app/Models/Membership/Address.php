<?php

namespace App\Models\Membership;

use App\Models\District;
use App\Models\Province;
use App\Models\LocalLevel;
use App\Models\LocalLevelType;
use App\Traits\Base\BaseModel;

class Address extends BaseModel
{
    protected $table = 'member_addresses';

    public function permProvince()
    {
        return $this->belongsTo(Province::class, 'perm_province_id', 'id');
    }

    public function permDistrict()
    {
        return $this->belongsTo(District::class, 'perm_district_id', 'id');
    }

    public function permLocalLevel()
    {
        return $this->belongsTo(LocalLevel::class, 'perm_local_level_id', 'id');
    }
}
