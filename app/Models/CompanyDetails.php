<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanyDetails extends BaseModel
{
    use HasFactory;

    protected $table = 'company_details';

    protected $gaurded = ['id'];

    // protected $fillable = [

    //     'company_name_en', 'company_name_lc','company_description', 'logo_image',

    //     'phone_number', 'mobile_number', 'email_address', 'company_address',

    //     'total_members', 'google_map', 'start_date_ad', 'start_date_bs',

    //     'about_us', 'our_history', 'our_vision', 'our_mission',

    //     'our_vision_image', 'our_mission_image',

    //     'home_about_content', 'home_about_image_1', 'home_about_image_2', 'home_about_image_3',

    //     'home_about_accordion_title_1', 'home_about_accordion_title_2', 'home_about_accordion_title_3',

    //     'home_about_accordion_content_1', 'home_about_accordion_content_2', 'home_about_accordion_content_3',

    //     'created_by', 'updated_by'
    // ];

    public function getLogoAttribute()
    {
        // dd($this->logo_image);
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
