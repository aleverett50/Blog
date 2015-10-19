<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Blog;
use Auth;

class CountBlogsComposer {

    public function compose(View $view){
    
		$blog_count = Blog::whereUserId( Auth::user()->id )->get();

		$view->with('blog_count', count($blog_count));
	
    }

}