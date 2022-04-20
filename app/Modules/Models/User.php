<?php

namespace App\Modules\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use  HasFactory, Notifiable, SoftDeletes, HasRoles, HasPermissions;

    protected $path = 'uploads/user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'username', 'password', 'slug', 'status',
        'image', 'phone', 'email_verified_at'
    ];

    protected $appends = ['thumbnail_path', 'image_path', 'status_text', 'full_name'];

    function getImagePathAttribute()
    {
        if ($this->image)
            return $this->path . '/'  . $this->image;
        else
            return 'assets/admin/media/user_placeholder.png';
    }

    function getStatusTextAttribute()
    {
        return ucwords(str_replace('_', '', $this->status));
    }

    function getFullNameAttribute()
    {
        return ucwords($this->first_name) . ' ' . ucwords($this->last_name);
    }

    function getThumbnailPathAttribute()
    {
        if ($this->image)
            return $this->path .  '/' . $this->image;
        // return $this->path .  '/thumb/' . $this->image;
        else
            return 'assets/admin/media/user_placeholder.png';
    }

    /**
     * Get the parent barcodeable model (Attendance or customer).
     */
    public function barcode()
    {
        return $this->morphOne(Barcode::class, 'barcodeable');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
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
}
