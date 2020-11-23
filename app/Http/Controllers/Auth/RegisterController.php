<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
	 public function redirectTo()
    {
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
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
		$data = array();
    	$data['status'] = 'success';
    	$data['message'] = 'Registration success';
    	return response()->json($data);
    }
}
