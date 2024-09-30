<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table= 'reviews';
    protected $fillable = [
        'business_id',
        'name',
        'email',
        'review',
        'rating',
        'approved',
        'rejected',
    ];

    public function businesses()
    {
        return $this->belongsTo(Business::class);
    }

}
