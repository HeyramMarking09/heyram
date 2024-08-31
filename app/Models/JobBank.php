<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBank extends Model
{
    use HasFactory;
    protected $table   = 'job_banks'; 
    protected $guarded = []; 

    public function users()
    {
        return $this->belongsTo(User::class,'employer_id', 'id');
    }
    public function lmias()
    {
        return $this->belongsTo(Lmia::class,'employer_id', 'employer_id');
    }
}
