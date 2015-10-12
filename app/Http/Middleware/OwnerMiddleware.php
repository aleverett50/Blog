<?php namespace App\Http\Middleware;

use Closure;
use App\Blog;

class OwnerMiddleware {
	 
	public function handle($request, Closure $next){
	
	$resource = Blog::find($request->id);
	
	if( $resource->user_id != $request->user()->id ){
	
		return redirect('no-auth');
	
	}  else {
	
		return $next($request);
		
		
		}	
		
	}

}
