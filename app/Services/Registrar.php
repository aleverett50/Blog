<?php namespace App\Services;

use App\User;
use Mail;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:1',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
	
	$activation_code = str_random(60);
	$data['first_name'] = ucwords($data['first_name']);
	$data['last_name'] = ucwords($data['last_name']);
	
	Mail::send('emails.activation', ['activation_code' => $activation_code, 'data' => $data], function($message) use ($data) {
	
		$message->to($data['email'], ucwords($data['first_name'])." ".ucwords($data['last_name']))->subject('Verify your email address');
		
        });
	

		return User::create([
			'first_name' => ucwords($data['first_name']),
			'last_name' => ucwords($data['last_name']),
			'user_role_id' => 1,
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'activation_code' => $activation_code,
		]);
	}

}
