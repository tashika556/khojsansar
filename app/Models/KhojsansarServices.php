<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhojsansarServices extends Model
{
    use HasFactory;
    protected $table = 'khojsansar_services';
    protected $fillable = [
      'title',
      'details',
      'banner',
      'icon',
    ];

}
