<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    public function visaDocuments(){
        return $this->hasMany(Visa_document::class,'visa_id','id');
    }
    public function visaFAQs(){
        return $this->hasMany(Visa_faq::class,'visa_id','id');
    }
}
