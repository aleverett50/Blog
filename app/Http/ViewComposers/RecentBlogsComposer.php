<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Blog;

class RecentBlogsComposer {

    public function compose(View $view){
    
		$recent_blogs = Blog::orderBy('created_at' , 'DESC')->take(2)->get();

		$view->with('recent_blogs', $recent_blogs);
	
    }

}