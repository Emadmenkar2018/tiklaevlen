<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteStory extends Model
{
    protected $table = 'website_stories';
    protected $fillable = [
        'title',
        'tag_date',
		'website',
		'description'
    ];
}
