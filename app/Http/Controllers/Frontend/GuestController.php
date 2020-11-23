<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Guest;
class GuestController extends \App\Http\Controllers\Controller
{
	public function __construct()
    {

    }
    public function index(Request $request)
    {
		$guests = Guest::where('user_id',$request->user()->id)->get();
		return view('guests',[
			"guests" => $guests
		]);
	}
	
}
