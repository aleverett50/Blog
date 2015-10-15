<?php namespace App\Http\Controllers;

use App\User;
use Auth;

class PagesController extends Controller {

	
	
	public function dashboard()
	{
		return view('dashboard');
	}
	
	public function verify($activation_code){

			if( empty($activation_code) ) {
			
			    exit('no code');
			    
			}

			$user = User::whereActivationCode($activation_code)->first();

			if ( !$user ){
			
			    exit('no user');
			    
			}

			$user->is_active = 1;
			$user->activation_code = null;
			$user->save();
			Auth::login($user);

			return redirect('home')->withSuccess('You have successfully verified your account.');


	}

}
