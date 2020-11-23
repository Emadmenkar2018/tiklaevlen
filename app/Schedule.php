<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = [
        'website',
        'event_type',
		'event_name',
		'date',
		'start_time',
		'end_time',
		'event_location',
		'description'
    ];
	protected $casts = [
        'event_location' => 'array'
    ];
}
