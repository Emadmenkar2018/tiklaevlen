<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Il extends Model
{
	protected $table = 'il';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'il_no', 'isim'
    ];

}
