<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'name',
        'department',
        'description',
        'image',
        'twitterurl',
        'facebookurl',
        'instagramurl',
        'linkedinurl',
    ];
}
