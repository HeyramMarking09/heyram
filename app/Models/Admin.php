<?php

namespace App\Models;

use App\Contracts\Roleable;
use App\Traits\HasRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements Roleable
{
    use HasFactory;
    use HasRole;
    protected $table = 'admins';
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
