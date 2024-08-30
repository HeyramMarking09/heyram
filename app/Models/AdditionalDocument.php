<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalDocument extends Model
{
    use HasFactory;
    protected $table = 'additional_documents';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'employer_id', 'id');
    }
}
