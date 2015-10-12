<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'blog_categories';
	
	protected $fillable = ['title'];
	
	public function blogs(){
	
		return $this->hasMany('App\Blog');		/*  A Blog Category has many blogs  */
	
	}

}
