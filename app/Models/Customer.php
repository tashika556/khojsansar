<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table= 'customers';

    protected $fillable = [
      'authorize',
      'business',
      'category',
      'first_name',
      'middle_name',
      'last_name',
      'permanent-state',
      'permanent-district',
      'permanent-municipality',
      'permanent-ward',
      'permanent-tole',
      'temporary-state',
      'temporary-district',
      'temporary-municipality',
      'temporary-state',
      'temporary-district',
      'temporary-municipality',
      'temporary-ward',
      'temporary-tole',
      'email',
      'phone',
      'cell',
      'user_name',
      'password',
      'cpassword',
      'agree',
      'otp',
    ];  
    public function permanentState()
    {
        return $this->belongsTo(Province::class, 'permanent_state', 'id');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo(District::class, 'permanent_district', 'id');
    }

    public function permanentMunicipality()
    {
        return $this->belongsTo(Municipality::class, 'permanent_municipality', 'id');
    }

    public function temporaryState()
    {
        return $this->belongsTo(Province::class, 'temporary_state', 'id');
    }

    public function temporaryDistrict()
    {
        return $this->belongsTo(District::class, 'temporary_district', 'id');
    }

    public function temporaryMunicipality()
    {
        return $this->belongsTo(Municipality::class, 'temporary_municipality', 'id');
    }
}
