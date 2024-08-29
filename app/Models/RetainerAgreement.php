<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetainerAgreement extends Model
{
    protected $table ='retainer_agreements';   
    protected $guarded = [];   

    public function users()
    {
        return $this->belongsTo(User::class,'employer_id', 'id');
    }
}
