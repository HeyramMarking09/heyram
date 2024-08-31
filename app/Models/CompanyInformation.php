<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    protected $table = 'company_information';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'employer_id', 'id');
    }
    public function lmia()
    {
        return $this->belongsTo(User::class,'employer_id', 'employer_id');
    }
}
