<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Model implements JWTSubject
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
      'permanent_state',
      'permanent_district',
      'permanent_municipality',
      'permanent_ward',
      'permanent_tole',
      'permanent_city',
      'temporary_state',
      'temporary_district',
      'temporary_municipality',
      'temporary_ward',
      'temporary_tole',
      'temporary_city',
      'address',
      'email',
      'phone',
      'cell',
      'user_name',
      'password',
      'cpassword',
      'agree',
      'otp',
      'admin_verified',
      'admin_rejected',
      'rejection_reason',
    ];  
    public function authorizeshow()
    {
        return $this->belongsTo(Authorize::class, 'authorize', 'id');
    }
    public function categoryshow()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
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
    public function business()
{
    return $this->hasOne(Business::class, 'customer', 'id');
}
/**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
