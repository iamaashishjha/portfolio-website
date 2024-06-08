<?php

namespace App\Base;

use App\Traits\GlobalScopesTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\GlobalRelationsEntityTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory;
    use GlobalScopesTrait, GlobalRelationsEntityTrait;

    protected $guarded = ['id'];

    protected static function boot()
    {
        $user = Auth::user();
        parent::boot();
        static::creating(function ($model) use ($user) {
            $columns = Schema::getColumnListing($model->getTable());
            if (in_array('created_by', $columns)) {
                $model->created_by =  !is_null($user) ? $user->id : null;
            }
        });

        static::updating(function ($model) use ($user) {
            $columns = Schema::getColumnListing($model->getTable());
            if (in_array('updated_by', $columns)) {
                $model->updated_by =  !is_null($user) ? $user->id : null;
            }
        });

        static::deleting(function ($model) {
            $columns = Schema::getColumnListing($model->getTable());
            if (in_array('deleted_by', $columns)) {
                $model->deleted_by =  Auth::id();
            }
        });
    }

    public function getStatusAttribute()
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

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

}
