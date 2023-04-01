<?php

namespace App\Models;

use App\Traits\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class Slider extends BaseModel
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'slider_title', 'slider_description',
        'image_a', 'heading1', 'subheading1',
        'image_b', 'heading2', 'subheading2',
        'image_c', 'heading3', 'subheading3',
        'image_d', 'heading4', 'subheading4',
        'image_e', 'heading5', 'subheading5',
        'created_by', 'is_active'
    ];

    public function checkStatus()
    {
        $status = $this->attributes['is_active'];
        if ($status == 0) {
            return '';
        } else {
            return 'checked';
        }
    }

    public function getSliderImageAAttribute()
    {
        return '/storage/' . $this->image_a;
    }

    // public function setSliderImageAAttribute($value)
    // {
    //     // $this->attributes['image_a'] = Image::resize(1920,811);

    // }

    public function getSliderImageBAttribute()
    {
        if ($this->image_b != null) {

            return '/storage/' . $this->image_b;
        } else
            return "/ar/dist/images/preview-6.jpg";
    }

    public function getSliderImageCAttribute()
    {
        if ($this->image_c != null) {

            return '/storage/' . $this->image_c;
        } else
            return "/ar/dist/images/preview-6.jpg";
    }

    public function getSliderImageDAttribute()
    {
        if ($this->image_d != null) {

            return '/storage/' . $this->image_d;
        } else
            return "/ar/dist/images/preview-6.jpg";
    }

    public function getSliderImageEAttribute()
    {
        if ($this->image_e != null) {

            return '/storage/' . $this->image_e;
        } else
            return "/ar/dist/images/preview-6.jpg";
    }

    // public function sliderImage($num)
    // {
    //     return '/storage/'.$this->image_.$num;
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deleteImage($value)
    {
        Storage::delete($this->image_ . $value);
    }
}
