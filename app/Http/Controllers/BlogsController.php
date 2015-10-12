<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;							/*  INCLUDE AUTH FOR LOGIN IN AND GETTING LOGGED IN USER DETAILS  */
use App\Blog;						/*  INCLUDE BLOG MODEL  */
use App\Http\Requests\SaveBlogRequest; 	/*  INCLUDE SAVEBLOGREQUEST  */
use lluminate\Http\JsonResponse;

class BlogsController extends Controller {

	/**
	
	Auth::loginUsingId(2);  This will login the user with ID 2
	
	*/
	
	public function index()
	{
	
	$blogs = Blog::orderBy('created_at' , 'DESC')->get();
	
		return view('blogs.index')->with('blogs', $blogs);
	}


	public function create()
	{
	
		return view('blogs.create');
	}

	public function store(SaveBlogRequest $request)
	{

		$request['title'] = ucwords($request['title']);	

		$request['user_id'] = Auth::user()->id;
		
		Blog::create($request->all());
		
		return redirect('blogs')->withSuccess('Blog Has Been Created');

	}


	public function show($id)
	{
	
		$blog = Blog::find($id);
		
		return view('blogs.show')->with('blog', $blog);
	
	}
		
		
	public function category($category)
	{
	
/*  $blogs = "select * from blogs where blogs.deleted_at is null and 

(select count(*) from blog_categories where blogs.blog_category_id = blog_categories.id and title = music and blog_categories.deleted_at is null) >= 1)";  */

	$blogs = Blog::whereHas('blog_category', function($query) use ($category) {
	
	    $query->whereTitle($category);

	})->orderBy('created_at' , 'DESC')->get();

	return view('blogs.category')->with('blogs', $blogs)->with('category', $category);

	}
	
	public function my_blogs()
	{
	
	$blogs = Blog::whereUserId(Auth::user()->id)->orderBy('created_at' , 'DESC')->get();
	
		return view('dashboard.blogs.index')->with('blogs', $blogs);
	}


	public function edit($id)
	{
	
	$blog = Blog::find($id);

	return view('dashboard.blogs.edit')->with('blog', $blog);
	
	}


	public function update(SaveBlogRequest $request, $id)
	{

	$blog = Blog::find($id);
	
	$blog->update($request->all());
	
	return redirect('dashboard/blogs')->withSuccess('Blog Has Been Updated');	
	
	}


	public function destroy($id)
	{
		//
	}

}
