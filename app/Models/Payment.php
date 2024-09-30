<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table= 'payments';

    protected $fillable = [
      'payment_receipt',
      'business',
'payment_confirmation',
'admin_payment_confirmation',
'rejection_reason',
    ];
    public function businesses()
    {
        return $this->belongsTo(Business::class, 'business');
    }
}
