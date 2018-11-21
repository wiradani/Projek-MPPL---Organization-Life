<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class WelcomeController extends Controller
{
    public function index()
    {
    	if (Auth::check()){
    		return view('welcome');
    	} else{
    		return view('login');
    	}
    }
    //
}
