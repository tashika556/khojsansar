<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;
    protected $table = 'specials';
    protected $fillable = ['business','special_name','short_detail','price','photo'];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business');
    }
}
