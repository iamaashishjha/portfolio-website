<?php

namespace App\Models\Membership;

use App\Models\User;
use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends BaseModel
{
    protected $table = 'members';

    // private function setMembershipIdAttribute()
    // {

    // }

    public function getNameAttribute(): string
    {
        return $this->name_en . ' (' . $this->name_lc . ') ';
    }

    public function scopeRegisteredMember($query)
    {
        return $query->where('is_verified', false)->orWhereNull('is_verified');
    }

    public function scopeApprovedMember($query)
    {
        return $query->where('is_verified', true);
    }

    public function getStatusAttribute(): string
    {
        $status = $this->attributes['is_verified'];
        if ($status == 0) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-6' . '"> <i class="w-4 h-4 mr-2 fa fa-times' . '"></i> </div>';
        } elseif ($status == 1) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-9' . '"> <i class="w-4 h-4 mr-2 fa fa-check' . '"></i> </div>';
        } else {
            return 'NULL';
        }
    }

    public function partyDetailsEntities(): HasMany
    {
         return $this->hasMany(PartyDetails::class, 'member_id', 'id');
    }

    public function propertyEntities(): HasMany
    {
         return $this->hasMany(Property::class, 'member_id', 'id');
    }

    public function generalDetailsEntity(): HasOne
    {
         return $this->hasOne(GeneralDetails::class, 'member_id', 'id');
    }

    public function addressesEntity(): HasOne
    {
         return $this->hasOne(Address::class, 'member_id', 'id');
    }

    public function identityEntities(): HasMany
    {
         return $this->hasMany(Identity::class, 'member_id', 'id');
    }

    public function userEntity(): HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
