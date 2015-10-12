<?php namespace App\Http\Controllers;

use Session;

class WelcomeController extends Controller {

	public function __construct()
	{
	
		
		
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

}
