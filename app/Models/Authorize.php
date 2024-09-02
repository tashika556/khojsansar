<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorize extends Model
{
    use HasFactory;
    protected $table= 'authorizes';

    protected $fillable = [
      'authorize_name',

    ];
}
