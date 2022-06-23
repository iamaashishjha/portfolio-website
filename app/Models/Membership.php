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

    // protected $fillable = [

    //     'name_en', 'name_lc', 'gender_id',
    //     'birth_date_ad', 'birth_date_bs', 'citizen_province_id',
    //     'citizen_district_id', 'citizenship_number', 'passport_number',
    //     'voter_id_number',

    //     'perm_province_id', 'perm_district_id', 'perm_local_level_id',
    //     'perm_local_level_type_id', 'perm_ward_number', 'perm_tole',
        
    //     'temp_province_id', 'temp_district_id', 'temp_local_level_id',
    //     'temp_local_level_type_id', 'temp_ward_number', 'temp_tole',


    //     'email', 'phone_number', 'mobile_number',
    //     'cast', 'category', 'category_source',
    //     'education_qualification', 'blood_group', 'other_identity',
        
    //     'father_name', 'mother_name', 'grand_father_name',
    //     'grand_mother_name',

    //     'mariatal_status_id', 'wife_name', 'total_family_member',


    //     'profession', 'source_income',

    //     'property_cash', 'property_fixed', 'property_share',
    //     'property_other',


    //     'party_post', 'committee_name', 'party_lebidar',
    //     'party_joined_date_ad', 'party_joined_date_bs', 'party_location',
    //     'political_background',


    //     'own_image', 'sign_image', 'citizenship_front',
    //     'citizenship_back', 'passport_front', 'passport_back',
    //     'license_image', 'pan_front', 'pan_back',

    //     'verified_by'

    // ];

    protected $guarded = ['id'];

    public function getStatusAttribute()
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

    public function getDocOwnImageAttribute()
    {
        $image = $this->own_image;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocSignImageAttribute()
    {
        $image = $this->sign_image;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocCitizenshipFrontAttribute()
    {

        $image = $this->citizenship_front;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocCitizenshipBackAttribute()
    {
        $image = $this->citizenship_back;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocPassportFrontAttribute()
    {
        $image = $this->passport_front;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocPassportBackAttribute()
    {
        $image = $this->passport_back;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocLicenseImageAttribute()
    {
        $image = $this->license_image;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocPanFrontAttribute()
    {
        $image = $this->pan_front;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function getDocPanBackAttribute()
    {
        $image = $this->pan_back;
        if($image !== NULL){
            return '/storage/' . $image;
        }else{
            return NULL;
        }
    }

    public function citizenProvince()
    {
        return $this->belongsTo(Province::class, 'citizen_province_id', 'id');
    }

    public function citizenDistrict()
    {
        return $this->belongsTo(District::class, 'citizen_district_id', 'id');
    }

    public function permProvince()
    {
        return $this->belongsTo(Province::class, 'perm_province_id', 'id');
    }

    public function permDistrict()
    {
        return $this->belongsTo(District::class, 'perm_district_id', 'id');
    }

    public function permLocalLevelType()
    {
        return $this->belongsTo(LocalLevelType::class, 'perm_local_level_type_id', 'id');
    }

    public function permLocalLevel()
    {
        return $this->belongsTo(LocalLevel::class, 'perm_local_level_id', 'id');
    }

    public function tempProvince()
    {
        return $this->belongsTo(Province::class, 'temp_province_id', 'id');
    }

    public function tempDistrict()
    {
        return $this->belongsTo(District::class, 'temp_district_id', 'id');
    }

    public function tempLocalLevelType()
    {
        return $this->belongsTo(LocalLevelType::class, 'temp_local_level_type_id', 'id');
    }

    public function tempLocalLevel()
    {
        return $this->belongsTo(LocalLevel::class, 'temp_local_level_id', 'id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    public function approveUser()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function getDocs()
    {
        $files = [];
        if (isset($this->doc_own_image)) {
            $arrayData = [
                'file' => $this->doc_own_image,
                'name' => 'Own Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_sign_image)) {
            $arrayData = [
                'file' => $this->doc_sign_image,
                'name' => 'Signature Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_citizenship_front)) {
            $arrayData = [
                'file' => $this->doc_citizenship_front,
                'name' => 'Citizenship Front Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_citizenship_back)) {
            $arrayData = [
                'file' => $this->doc_citizenship_back,
                'name' => 'Citizenship Back Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_passport_front)) {
            $arrayData = [
                'file' => $this->doc_passport_front,
                'name' => 'Passport Front Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_passport_back)) {
            $arrayData = [
                'file' => $this->doc_passport_back,
                'name' => 'Passport Back Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_license_image)) {
            $arrayData = [
                'file' => $this->doc_license_image,
                'name' => 'License Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_pan_front)) {
            $arrayData = [
                'file' => $this->doc_pan_front,
                'name' => 'Pan Card Front Image'
            ];
            array_push($files, $arrayData);
        }
        if (isset($this->doc_pan_back)) {
            $arrayData = [
                'file' => $this->doc_pan_back,
                'name' => 'Pan Card Back Image'
            ];
            array_push($files, $arrayData);
        }
        return $files;
    }
}
