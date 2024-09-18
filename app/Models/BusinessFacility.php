<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessFacility extends Model
{
    use HasFactory;
    protected $table = 'business_facilities';


    protected $fillable = ['facility', 'business'];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility');
    }
}
