<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessMenu extends Model
{
    use HasFactory;
    protected $table = 'business_menus';
    protected $fillable = ['menu_topic', 'business','title','price','caption','photo'];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_topic');
    }
}
