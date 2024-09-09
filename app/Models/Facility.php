<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $table= 'facilities';

    protected $fillable = [
      'facility_name',
'facility_logo',
    ];
    public function businesses()
    {
        return $this->belongsToMany(Business::class, 'business_facilities', 'facility', 'business');
    }
}
