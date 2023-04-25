<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Types extends BaseModel
{
    protected $table = 'types';

    const MOBILE = 1;
    const EMAIL = 2;
    const FILE = 3;
    const TEXT = 4;


    const LEADERSHIP = 5;
    const COMMITTEE = 6;



    const HISTORY = 21;
    const GOVERMENT = 22;
    const PARLIAMENTMEMBER = 23;

    const CENTRALCOMMITTEE = 31;
    const DISTRICTCOMMITTEE = 32;
    const LOCALLEVELCOMMITTEE = 33;
    const PROVINCECOMMITTEE = 34;
    const COMMITTEEPRESEIDENT = 35;
    const COMMITTEEVICEPRESEIDENT = 36;
    const COMMITTEESECRETRAYGENERAL = 37;
    const COMMITTEESECRETRAY = 38;
    const COMMITTEESECRETRAYDEPUTY = 39;
    const COMMITTEEMEMBER = 40;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->orderBy('id');
        });
    }

    public function getNameAttribute()
    {
        return $this->name_en.' ('.$this->name_lc.') ';
    }
}
