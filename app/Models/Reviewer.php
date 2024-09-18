<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'provider', 'provider_id'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
