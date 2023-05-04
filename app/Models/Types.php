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
    const ELECTIONWINNERS = 7;


    //Content Page Type
    const HISTORY = 21;
    const GOVERMENT = 22;
    const PARLIAMENT = 23;
    const MASSORGANIZATION = 24;
    const DONATION = 25;


    // Committee Types
    const CENTRALCOMMITTEE = 31;
    const DISTRICTCOMMITTEE = 32;
    const LOCALLEVELCOMMITTEE = 33;
    const PROVINCECOMMITTEE = 34;

    
    // Committee Member Type
    const COMMITTEEPRESEIDENT = 41;
    const COMMITTEEVICEPRESEIDENT = 42;
    const COMMITTEESECRETRAYGENERAL = 43;
    const COMMITTEESECRETRAY = 44;
    const COMMITTEESECRETRAYDEPUTY = 45;
    const COMMITTEEMEMBER = 46;



    //Gallery Type
    Const YOUTUBEVIDEO = 61;
    Const FACEBOOKVIDEO = 62;
    Const TWITTERVIDEO = 63;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            $builder->orderBy('id');
        });
    }

    public function getNameAttribute()
    {
        return $this->name_en . ' (' . $this->name_lc . ') ';
    }
}
