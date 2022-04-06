<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'admin'
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
        $status = $this->attributes['admin'];
        if ($status == 0) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-6' . '"> <i data-feather=' . '"user' . '" class="w-4 h-4 mr-2' . '"></i> User </div>';
        } elseif ($status == 1) {
            return '<div class=' . '"flex items-center sm:justify-center text-theme-9' . '"> <i data-feather=' . '"user-check' . '" class="w-4 h-4 mr-2' . '"></i> Admin </div>';
        } else {
            return 'NULL';
        }
    }
}
