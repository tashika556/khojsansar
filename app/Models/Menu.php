<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table= 'menus';

    protected $fillable = [
      'menu_topic',

    ];
    public function businesses()
    {
        return $this->belongsToMany(Business::class, 'business_menus', 'menu_topic', 'business');
    }
    public function menuItems()
    {
        return $this->hasMany(BusinessMenu::class, 'menu_topic');
    }
    
}
