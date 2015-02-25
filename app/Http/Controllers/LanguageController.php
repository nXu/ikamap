<?php namespace App\Http\Controllers;

use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\LocalizationHelper;
use Illuminate\Http\Request;

class LanguageController extends Controller {

	/**
	 * Controls the GET request to /language/{language}.
	 * Sets the language to the given parameter if it exists.
	 * @param  string $language Language code.
	 * @return Response
	 */
	public function getSetLanguage($language) {
		if (LocalizationHelper::setLanguage($language)) {
			// Valid language, save it into a cookie
			return Redirect::to('/')->withCookie(cookie()->forever('language', $language));
		} else {
			// Invalid language
			return Redirect::to('/');
		}

	}
}
