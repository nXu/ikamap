<?php namespace App\Http\Middleware;

use App, Closure, Session, Request;
use App\Libraries\LocalizationHelper;

class LocalizationMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Check if language has been stored in the session
		if (!Session::has('language')) {
			// No language stored. Read if there is a cookie
			if (Request::hasCookie('language')) {
				LocalizationHelper::setLanguage(Request::cookie('language'));
			}
		} else {
			App::setLocale(Session::get('language'));
		}

		return $next($request);
	}
}
