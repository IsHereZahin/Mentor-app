<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoursesFeatures;
use App\Models\Trainers;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'name',
        'short_desc',
        'long_desc',
        'fee',
        'total_seat',
        'schedule',
        'trainer_id',
        'image',
    ];
    function totalFeature(){
        return $this->hasMany(CoursesFeatures::class,'course_id','id');
    }

    function feature(){
        return $this->hasMany(CoursesFeatures::class,'course_id','id');
    }

    function trainerName()
    {
        return $this->belongsTo(Trainers::class,'trainer_id','id')->select('id','name');
    }
}
