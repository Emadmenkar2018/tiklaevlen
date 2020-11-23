<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class Register2Controller extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function create(Request $data)
    {
        $user = User::create([
            'name' => $data['name'],
			'lastname' => $data['lastname'],
			'husband_name' => $data['husband_name'],
			'husband_lastname' => $data['husband_lastname'],
			'marriage_date_day' => $data['marriage_date_day'],
			'marriage_date_month' => $data['marriage_date_month'],
			'marriage_date_year' => $data['marriage_date_year'],
			'decide' => $data['decide'],
			'katilimci_sayisi' => $data['katilimci_sayisi'],
			'taki' => $data['taki'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);
		Auth::login($user);
		$data = array();
    	$data['status'] = 'success';
    	$data['message'] = 'Registration success';
    	return response()->json($data);
    }
}
