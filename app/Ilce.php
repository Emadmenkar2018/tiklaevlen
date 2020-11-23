<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Ilce extends Model
{
	protected $table = 'ilce';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'il_no', 'isim','ilce_no'
    ];

}
