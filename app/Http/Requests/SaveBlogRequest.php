<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveBlogRequest extends Request {


	public function authorize()
	{
		return true;
	}

	 
	public function messages(){

	    return [
	    
		'title.required' => 'The title field is required.',
		'blog_category_id.required' => 'The blog category field is required.',

	    ];
	    
	}

	 
	public function rules(){
	
	/*  Request::get('title')  this is $_POST['title']  */
	
		return [
		
		'title' => 'required',
		'blog_category_id' => 'required',
		'blog_text' => 'required',
		
		];
		
		
	}

}
