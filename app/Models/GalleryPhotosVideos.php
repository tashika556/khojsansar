<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPhotosVideos extends Model
{
    use HasFactory;
    protected $table= 'gallery_photos_videos';

    protected $fillable = [
      'business','photosvideos',

    ];
    public function business()
    {
        return $this->belongsTo(Business::class, 'business');
    }
}
