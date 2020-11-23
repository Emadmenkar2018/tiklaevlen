<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleData extends Model
{
    protected $table = 'website_module_datas';
    protected $fillable = [
        'website',
        'module',
		'data',
    ];
	protected $casts = [
        'data' => 'array'
    ];
}
