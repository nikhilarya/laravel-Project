<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class AdminController extends Controller
{
    public function dashboard()
	{

		// $customer = new Customer;
	 //    $customer->name = 'Nikhil';
	 //    $customer->address = 'XYZ';
	 //    $customer->phone = '8432468236';
	 //    $customer->save();

		return view('test-data');
	}

	public function formSubmit(Request $request) #form-submit
	{
		$this->validate($request, [
			'username' => 'required|alpha'
		]);

		echo $request->username;
	}
}
