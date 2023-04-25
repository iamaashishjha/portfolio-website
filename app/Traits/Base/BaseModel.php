<?php

namespace App\Traits\Base;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function boot()
    {
        $user = Auth::user();
        parent::boot();
        static::creating(function ($model) use ($user) {
            $columns = Schema::getColumnListing($model->getTable());
            if (in_array('created_by', $columns)) {
                $model->created_by =  !is_null($user) ? $user->id : 1;
            }
        });

        static::updating(function ($model) use ($user) {
            $columns = Schema::getColumnListing($model->getTable());
            if (in_array('updated_by', $columns)) {
                $model->updated_by =  !is_null($user) ? $user->id : 1;
            }
        });

        static::deleting(function ($model) use ($user) {
            $columns = Schema::getColumnListing($model->getTable());
            if (in_array('deleted_by', $columns)) {
                $model->deleted_by =  $user->id;
            }
        });

        static::addGlobalScope(function (Builder $builder) {
            $builder->orderBy('id', 'desc');
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

    public function scopeActive($query)
    {
        return $query->where('is_active', TRUE);
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', TRUE);
    }

    public function scopeDeleted($query)
    {
        return $query->where('is_deleted', TRUE);
    }

    public function scopeNotDeleted($query)
    {
        return $query->where('is_deleted', FALSE);
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedByEntity()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deletedByEntity()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
