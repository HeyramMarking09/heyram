<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDoc extends Model
{
    use HasFactory;
    protected $table = 'company_docs';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'employer_id', 'id');
    }
}
