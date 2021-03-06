<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    protected $fillable = [
        'name',
		'email',
		'guests',
		'messages',
		'user_id'
    ];
}
