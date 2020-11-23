<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if ($this->guard()->user()->type->isAdmin()) {
            return config('konekt.app_shell.ui.url');
        }

        return '/home';
    }
	protected function login(Request $request)
	{
	    $validator = Validator::make($request->all(), [
	       'email' => 'required|email',
	        'password' => 'required',
	    ]);

	    if ($validator->passes()) {
	        if (auth()->attempt(array('email' => $request->input('email'),
	          'password' => $request->input('password')),true))
	        {
	            return response()->json('success');
	        }
			return response()->json([
			    'error' => [
			        'email' => 'Sorry User not found.'
			    ]
			]);
	    }

	    return response()->json(['error'=>$validator->errors()->all()]);
	}
}
