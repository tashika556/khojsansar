<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table= 'contacts';

    protected $fillable = [
      'address_one',
      'address_two',
      'email_one',
      'email_two',
      'phone_one',
      'phone_two',
      'facebook_url',
      'twitter_url',
      'instagram_url',
      'youtube_url',
      'map_url'
    ];
}
