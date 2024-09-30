<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table= 'abouts';

    protected $fillable = [
      'details',
      'cover_image',
      'mission_image_one',
      'mission_image_two',
      'mission_details',
      'vision_image_one',
      'vision_image_two',
      'vision_details',

    ];
}
