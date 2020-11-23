<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsitePhotos extends Model
{
    protected $table = 'website_photos';
    protected $fillable = [
        'website',
        'photo',
    ];
}
