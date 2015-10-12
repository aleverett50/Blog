<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Jenssegers\Agent\Agent;

class MobileDetectComposer {

    public function compose(View $view){
    
		$detect = new Agent();
		
		/*
		
			$detect->isMobile()		available on all pages.
			$detect->isTablet()
		
		*/

		$view->with('detect', $detect);
	
    }

}