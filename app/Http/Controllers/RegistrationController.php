<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
	public function __construct()
	{

//this->middleware('auth')->except(['index', 'show']);
        $this->middleware('guest')->except(['index','show']);

	}
    public function create()
    {
        //dd(\Auth::check());
    	return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {

    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	//dd($user);
    	$user->save();
    	//sign in them
    	auth()->login($user);
        //welcome mail
        //\Mail::to($user)->send(new Welcome($user));
        session()->flash('message', 'Thanks so much for signing up!');
        
    	//Redirect to home page
    	return redirect()->home();
    }
}
