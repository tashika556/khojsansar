<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessService extends Model
{
    use HasFactory;
    protected $table = 'business_services';


    protected $fillable = ['service', 'business'];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service');
    }
}
