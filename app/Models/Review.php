<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['reviewer_id', 'business_id', 'review', 'rating'];

    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class, 'reviewer_id');
    }
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

}
