<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table= 'businesses';

    protected $fillable = [
      'customer',
      'summary',
      'address',
      'state',
      'district',
      'municipality',
      'ward',
      'tole',
      'latitude',
      'longitude'

    ];


public function customershow()
{
    return $this->belongsTo(Customer::class, 'customer', 'id');
}

public function stateshow()
{
    return $this->belongsTo(Province::class, 'state', 'id');
}

public function districtshow()
{
    return $this->belongsTo(District::class, 'district', 'id');
}

public function municipalityshow()
{
    return $this->belongsTo(Municipality::class, 'municipality', 'id');
}
public function services()
{
    return $this->belongsToMany(Service::class, 'business_services', 'business', 'service');
}
public function facilities()
{
    return $this->belongsToMany(Facility::class, 'business_facilities', 'business', 'facility');
}
public function menus()
{
    return $this->hasMany(BusinessMenu::class);
}

}