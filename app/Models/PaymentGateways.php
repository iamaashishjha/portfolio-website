<?php

namespace App\Models;

use App\Traits\Base\BaseModel;

class PaymentGateways extends BaseModel
{
    protected $table = 'payment_gateways';

    public function getImageAttribute($value)
    {
        return '/storage/' . $value;
    }

    public function getSigningFileAttribute($value)
    {
        return '/storage/' . $value;
    }

    public function setImageAttribute($value){
        $destinationPath = 'Payment-Gateways';
        $this->attributes['image'] = $value->store($destinationPath, 'public');
    }

    public function setSigningFileAttribute($value){
        $destinationPath = 'Payment-Gateways/Signing-File';
        $this->attributes['signing_file'] = $value->store($destinationPath, 'public');
    }

    public function getIsActiveAttribute()
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
}
