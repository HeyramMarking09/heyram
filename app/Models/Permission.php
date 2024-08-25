<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['module', 'sub_module'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions')
                        ->withPivot('can_create', 'can_edit', 'can_view', 'can_delete')
                        ->withTimestamps();
        }
}
