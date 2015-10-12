<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $fillable = ['first_name','last_name', 'user_role_id', 'email', 'password', 'activation_code'];

	protected $hidden = ['password', 'remember_token'];
	
	
	
	public function blogs(){
	
		return $this->hasMany('App\Blog');			/* A USER HAS MANY BLOGS */
		
	}
	
	public function user_role(){
	
		return $this->belongsTo('App\UserRole');		/*  A USER BELONGS TO A USER ROLE  */
		
	}

	

}









