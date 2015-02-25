<?php namespace App\Libraries;

use App, Session;

class LocalizationHelper {

	/**
	 * Gets all languages as an associative array.
	 * @return array Array of languages. Keys are language codes, values are localized language names.
	 */
	public static function getLanguages() {
		return [
			'en'	=> 'English',
			'hu'	=> 'Magyar'
		];
	}

	/**
	 * Sets the language and also saves it in the session
	 * @param string $language The language code.
	 * @return boolean True if the language exists, false if not.
	 */
	public static function setLanguage($language) {
		if (array_key_exists($language, self::getLanguages())) {
			// Language exists, set and return true
			App::setLocale($language);
			Session::put('language', $language);

			return true;
		} else {
			// Language does not exist
			return false;
		}
	}
}