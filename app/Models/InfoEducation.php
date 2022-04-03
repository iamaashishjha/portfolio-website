<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InfoEducation extends Model
{
    use HasFactory;


    protected $table = 'info_educations';

    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'education_image',
        'university', 'grades', 'no_of_year', 'created_by', 'updated_by',
        'is_active', 'institution',
    ];

    protected $guarded = ['id'];

    public function checkStatus()
    {
        # code...
        $status = $this->attributes['is_active'];
        if ($status == 0) {
            return '';
        } else {
            return 'checked';
        }
    }

    public function getStartDateAttribute()
    {
        $date = $this->attributes['start_date'];
        $start_date = strtotime($date);
        return date('Y - M - D', $start_date);
    }

    public function getEndDateAttribute()
    {
        $date = $this->attributes['end_date'];
        $end_date = strtotime($date);
        return date('Y - M - D', $end_date);
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

    public function getImageAttribute()
    {
        return '/storage/' . $this->education_image;
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
