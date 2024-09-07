<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallTagging extends Model
{
    use HasFactory;
    protected $table = 'call_taggings';
    protected $guarded = [];
}
