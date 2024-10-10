<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;
    protected $table = 'updates';
    protected $guarded = [];

    public function users()
    {
        return $this->hasOne(User::class,'id', 'client_id');
    }
}
