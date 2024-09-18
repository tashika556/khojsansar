<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPDF extends Model
{
    use HasFactory;
    protected $table= 'menu_pdfs';

    protected $fillable = [
      'pdf',
      'business',
    ];
    public function business()
    {
        return $this->belongsTo(Business::class, 'business');
    }
}
