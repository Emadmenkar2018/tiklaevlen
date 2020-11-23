<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'websites';
    protected $fillable = [
        'user',
        'product',
		'slug',
		'status',
		'active_modules'
    ];
	protected $casts = [
        'active_modules' => 'array'
    ];
}
