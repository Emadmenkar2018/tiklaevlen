<?php

namespace App;

class User extends \Konekt\AppShell\Models\User
{
	protected $fillable = [
        'lastname',
        'name',
		'email',
		'password',
		"husband_name",
		"husband_lastname",
		"marriage_date_month",
		"marriage_date_day",
		"marriage_date_year",
		"decide",
		"katilimci_sayisi",
		"taki",
		"website"
    ];
}
