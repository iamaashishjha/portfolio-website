<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanyDetails extends BaseModel
{
    protected $table = 'company_details';

    public function getLogoAttribute()
    {
        $image = $this->logo_image;
        if ($image != NULL) {
            return '/storage/' . $image;
        } else {
            return null;
        }
    }

    public function getAboutImage1Attribute()
    {
        $image = $this->home_about_image_1;
        if ($image != NULL) {
            return '/storage/' . $image;
        } else {
            return null;
        }
    }

    public function getAboutImage2Attribute()
    {
        $image = $this->home_about_image_2;
        if ($image != NULL) {
            return '/storage/' . $image;
        } else {
            return null;
        }
    }

    public function getAboutImage3Attribute()
    {
        $image = $this->home_about_image_3;
        if ($image != NULL) {
            return '/storage/' . $image;
        } else {
            return null;
        }
    }

    public function getMissionImageAttribute()
    {
        $image = $this->our_mission_image;
        if ($image != NULL) {
            return '/storage/' . $image;
        } else {
            return null;
        }
    }

    public function getVisionImageAttribute()
    {
        $image = $this->our_vision_image;
        if ($image != NULL) {
            return '/storage/' . $image;
        } else {
            return null;
        }
    }

    public function getPresidentPicAttribute()
    {
        $image = $this->president_image;
        if ($image != NULL) {
            return '/storage/' . $image;
        } else {
            return null;
        }
    }


    public function setGoogleMapAttribute($value)
    {
        $this->attributes['google_map'] = str_replace('width="560"', 'width="100%"', $value);
    }

    // // Define the getter method for the image attribute
    // public function getPresidentImageAttribute($value)
    // {
    //     return '/storage/' . $value;
    // }

    // // Define the setter method for the image attribute
    // public function setPresidentImageAttribute($value)
    // {
    //     $destinationPath = 'home/comapany-details';
    //     if ($value) {
    //         $this->attributes['president_image'] = $value->store($destinationPath, 'public');
    //     }
    // }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deleteLogoImage()
    {
        Storage::delete($this->logo_image);
    }

    public function deleteOurMissionImage()
    {
        Storage::delete($this->our_mission_image);
    }

    public function deleteOurVisionImage()
    {
        Storage::delete($this->our_vision_image);
    }

    public function getNameAttribute()
    {
        return $this->company_name_en.' ('.$this->company_name_lc.') ';
    }
}
