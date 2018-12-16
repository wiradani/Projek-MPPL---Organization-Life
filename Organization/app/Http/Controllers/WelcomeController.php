<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class WelcomeController extends Controller
{
    public function index()
    {	
		return view('welcome');

		// if (Auth::check()){
    	// 	return view('welcome');
    	// } else{
    	// 	return view('login');
    	// }
    }
    //
}
