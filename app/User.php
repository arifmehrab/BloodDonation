<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\role;
use App\Models\divition;
use App\Models\district;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'email', 'password', 'blood_group', 'phone_number', 'divition_id', 'district_id', 'upazila', 'local_area', 'association', 'profile', 'about', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Belongs To Role================
    public function role(){
        return $this->belongsTo(role::class, 'role_id', 'id');
    }
    // Belongs To Divition ============
    public function divition()
    {
        return $this->belongsTo(divition::class, 'divition_id', 'id');
    }
    // Belongs To District =============
    public function district()
    {
        return $this->belongsTo(district::class, 'district_id', 'id');
    }
}
