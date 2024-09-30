<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainLocationBannerRestaurant extends Model
{
    use HasFactory;
    protected $table= 'main_location_banner_restaurants';

    protected $fillable = [
      'cover_image',
      'district_id',
    ];
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id')->orderBy('district_name', 'ASC');
    }
}
