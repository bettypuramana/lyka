<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function countryName()
    {
        return $this->HasOne(Country::class, 'id', 'country');
    }
    public function tourType()
    {
        return $this->HasOne(Tour_type::class, 'id', 'tour_type');
    }
}
