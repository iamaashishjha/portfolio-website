<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class Membership extends Model
{
    use HasFactory;
    

    use HasFactory;

    protected $table = 'memberships';

    protected $fillable = [

        'name_en', 'name_lc', 'gender_id',
        'birth_date_ad', 'birth_date_bs', 'citizen_province_id',
        'citizen_district_id', 'citizenship_number', 'passport_number',
        'voter_id_number',

        'perm_province_id', 'perm_district_id', 'perm_local_level_id',
        'perm_local_level_type_id', 'perm_ward_number', 'perm_tole',
        
        'temp_province_id', 'temp_district_id', 'temp_local_level_id',
        'temp_local_level_type_id', 'temp_ward_number', 'temp_tole',


        'email', 'phone_number', 'mobile_number',
        'cast', 'category', 'category_source',
        'education_qualification', 'blood_group', 'other_identity',
        
        'father_name', 'mother_name', 'grand_father_name',
        'grand_mother_name',

        'mariatal_status_id', 'wife_name', 'total_family_member',


        'profession', 'source_income',

        'property_cash', 'property_fixed', 'property_share',
        'property_other',


        'party_post', 'committee_name', 'party_lebidar',
        'party_joined_date_ad', 'party_joined_date_bs', 'party_location',
        'political_background',


        'own_image', 'sign_image', 'citizenship_front',
        'citizenship_back', 'passport_front', 'passport_back',
        'license_image', 'pan_front', 'pan_back',

        'verified_by'

    ];

    // protected $guarded = ['id'];

    public function getDocOwnImageAttribute()
    {
        return '/storage/' . $this->own_image;
    }

    public function getDocSignImageAttribute()
    {
        return '/storage/' . $this->sign_image;
    }

    public function getDocCitizenshipFrontAttribute()
    {
        return '/storage/' . $this->citizenship_front;
    }

    public function getDocCitizenshipBackAttribute()
    {
        return '/storage/' . $this->citizenship_back;
    }

    public function getDocPassportFrontAttribute()
    {
        return '/storage/' . $this->passport_front;
    }

    public function getDocPassportBackAttribute()
    {
        return '/storage/' . $this->passport_back;
    }

    public function getDocLicenseImageAttribute()
    {
        return '/storage/' . $this->license_image;
    }

    public function getDocPanFrontAttribute()
    {
        return '/storage/' . $this->pan_front;
    }

    public function getDocPanBackAttribute()
    {
        return '/storage/' . $this->pan_back;
    }

    public function citizenProvince()
    {
        return $this->belongsTo(Province::class, 'citizen_province_id', 'id');
    }

    public function permProvince()
    {
        return $this->belongsTo(Province::class, 'perm_province_id', 'id');
    }

    public function tempProvince()
    {
        return $this->belongsTo(Province::class, 'temp_province_id', 'id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
