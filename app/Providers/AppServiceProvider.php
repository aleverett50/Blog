<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\BlogCategory;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
	
	/*  '*' means apply to all views. To appply to just one view it would be View::composer( 'view_name' )  */
	/*  View::composer(['profile', 'dashboard'], 'App\Http\ViewComposers\MyViewComposer'); for multiple views  */
	
        View::composer('partials.blogs.create_form', function($view)	
        {
	
		$blog_categories = ['' => 'Please Select'] + BlogCategory::all()->lists('title', 'id');
		$view->with('blog_categories', $blog_categories);

        });
	
	View::composer('*', 'App\Http\ViewComposers\RecentBlogsComposer');
	View::composer('*', 'App\Http\ViewComposers\MobileDetectComposer');
	View::composer('dashboard', 'App\Http\ViewComposers\CountBlogsComposer');
	
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
