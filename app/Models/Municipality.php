<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $table= 'municipalities';

    protected $fillable = [
      'municipality_name',
      'municipality_shortname',
      'district_id',
    ];
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id')->orderBy('district_name', 'ASC');
    }
}
