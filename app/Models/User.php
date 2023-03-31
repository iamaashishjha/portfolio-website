<?php

namespace App\Models;

use Laravolt\Avatar\Avatar;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'phone_number',
        'address',
        'designation',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogCategories()
    {
        return $this->hasMany(BlogCategory::class, 'created_by', 'id');
    }

    public function catCount()
    {
        return $this->blogCategories->count();
    }

    public function blogTags()
    {
        return $this->hasMany(BlogTags::class, 'created_by', 'id');
    }

    public function tagCount()
    {
        return $this->blogTags->count();
    }

    public function blogPost()
    {
        return $this->hasMany(BlogPost::class, 'created_by', 'id');
    }

    public function postCount()
    {
        return $this->blogPost()->count();
    }

    public function getAdminAttribute()
    {
        $status = $this->attributes['role'];
        return $status;
    }

    public function getImageAttribute()
    {
        $image = $this->profile_image;
        if ($image != NULL) {
            # code...
        return '/storage/' . $image;

        }else{
            return null;
        }
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function isAdmin()
    {
        $role = $this->role;
        if ($role == 1) {
            return true;
        }
        else{
            return false;
        }
    }

        //assign role to user
        public function assignRoleCustom($role_name, $model_id){
            $roleModel = Role::where('name', $role_name)->first();
            if(!$roleModel){
                return "role doesnot exists";
            }else{
                DB::table('model_has_roles')->insert([
                    'role_id' => $roleModel->id,
                    'model_type' => 'App\Models\User',
                    'model_id' => $model_id,
                ]);
            }

        }
}
