<?php namespace App\Http\Middleware;

use App, Closure, Cookie, Request, Session;
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
		// Check if there is a language change request
		if ($request->has('language')) {
			$language = $request->input('language');

			// Change language and save it into a cookie
			Cookie::queue('language', $language, 43200);
			LocalizationHelper::setLanguage($language);

			return $next($request);
		}

		// No language change request
		// Check if language has been stored in the session
		if (!Session::has('language')) {
			// No language stored. Read if there is a cookie
			if (Request::hasCookie('language')) {
				// There is a cookie
				LocalizationHelper::setLanguage(Request::cookie('language'));
			}
		} else {
			// Language is set
			App::setLocale(Session::get('language'));
		}

		return $next($request);
	}
}
