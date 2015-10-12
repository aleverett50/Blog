<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'blogs';
	
	protected $fillable = ['title', 'user_id', 'blog_category_id', 'blog_text'];
	
	public function user(){
	
		return $this->belongsTo('App\User');
	
	}
	
	public function blog_category(){
	
		return $this->belongsTo('App\BlogCategory');	/*  A blog belongs to a blog category  */
	
	}
	

	public function getCreatedAtAttribute($date){		//  This formats the date from created_at field
	
	    return date("d/m/Y", strtotime($date));
	
	
	}
	



}
