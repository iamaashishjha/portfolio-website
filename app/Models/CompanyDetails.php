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
        }else{
            return null;
        }
    }

    public function getAboutImage1Attribute()
    {
        $image = $this->home_about_image_1;
        if ($image != NULL) {
            return '/storage/' . $image;
        }else{
            return null;
        }
    }

    public function getAboutImage2Attribute()
    {
        $image = $this->home_about_image_2;
        if ($image != NULL) {
            return '/storage/' . $image;
        }else{
            return null;
        }
    }

    public function getAboutImage3Attribute()
    {
        $image = $this->home_about_image_3;
        if ($image != NULL) {
            return '/storage/' . $image;
        }else{
            return null;
        }
    }

    public function getMissionImageAttribute()
    {
        $image = $this->our_mission_image;
        if ($image != NULL) {
            return '/storage/' . $image;
        }else{
            return null;
        }
    }

    public function getVisionImageAttribute()
    {
        $image = $this->our_vision_image;
        if ($image != NULL) {
            return '/storage/' . $image;
        }else{
            return null;
        }
    }

    public function setGoogleMapAttribute($value)
    {
        $this->attributes['google_map'] = str_replace('width="560"', 'width="100%"', $value);
    }

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

    public function deleteAboutImage1()
    {
        Storage::delete($this->home_about_image_1);
    }

    public function deleteAboutImage2()
    {
        Storage::delete($this->home_about_image_2);
    }

    public function deleteAboutImage3()
    {
        Storage::delete($this->home_about_image_3);
    }

    public function deleteOurMissionImage()
    {
        Storage::delete($this->our_mission_image);
    }

    public function deleteOurVisionImage()
    {
        Storage::delete($this->our_vision_image);
    }
}
