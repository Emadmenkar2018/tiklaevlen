<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    protected $table = 'registry_items';
    protected $fillable = [
        'user',
        'product',
		'quantity',
		'property'
    ];
}
