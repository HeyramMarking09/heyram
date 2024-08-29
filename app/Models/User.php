<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Contracts\Roleable;
use App\Traits\HasRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements Roleable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes , HasRole;

    protected $guarded = [];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function hasRole($role)
    {
        return $this->role === $role;
    }
     // Define the relationship to the Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function companyInformation()
    {
        return $this->hasOne(CompanyInformation::class,'employer_id', 'id');
    }
    public function retainerAgreements()
    {
        return $this->hasOne(RetainerAgreement::class,'employer_id', 'id');
    }
    public function lmias()
    {
        return $this->hasMany(Lmia::class,'employer_id', 'id');
    }
    public function companyDoc()
    {
        return $this->hasOne(CompanyDoc::class,'employer_id', 'id');
    }
    public function jobBank()
    {
        return $this->hasMany(JobBank::class,'employer_id', 'id');
    }
}
