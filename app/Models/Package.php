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
    public function packageImages(){
        return $this->hasMany(Package_image::class,'package_id','id');
    }
    public function packageMoreHighlights(){
        return $this->hasMany(Package_more::class,'package_id','id')->where('type', 'highlights');
    }
    public function packageMoreIncludes(){
        return $this->hasMany(Package_more::class,'package_id','id')->where('type', 'includes');
    }
    public function packageMoreExcludes(){
        return $this->hasMany(Package_more::class,'package_id','id')->where('type', 'excludes');
    }
    public function packageDayPlans(){
        return $this->hasMany(Package_day_plan::class,'package_id','id');
    }
}
