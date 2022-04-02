<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class InfoEducation extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'info_educations';

    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'education_image',
        'university', 'grades', 'no_of_year', 'created_by', 'updated_by', 'deleted_by',
        'is_active', 'is_deleted', 'institution',
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

    public function getIsActiveAttribute()
    {
        $status = $this->attributes['status'];
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
        return '/storage/' . $this->tag_image;
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
