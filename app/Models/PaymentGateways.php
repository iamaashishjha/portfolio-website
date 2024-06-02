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
}
