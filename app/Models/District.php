<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table= 'districts';

    protected $fillable = [
      'district_name',
      'province_id',
    ];
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id')->orderBy('province_name', 'ASC');
    }
}
