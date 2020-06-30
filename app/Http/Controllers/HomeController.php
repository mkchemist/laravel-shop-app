<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    /**
     * user login
     *
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\Response
     */
    public function login(Request $request)
    {
    	$request->validate([
    		"email"	=>	"required|email",
    		"password"	=>	"required"
    	]);

    	if(Auth::attempt(["email" => $request->email, "password" => $request->password])) {
    		return redirect("/")->with([
    			'alert-message'	=>	"Welcome ".Auth::user()->name
    		]);
    	} else {
    		return redirect()->back()->with([
    			"login-message" => "Invalid Credentiales"
    		]);
    	}
    }
}
