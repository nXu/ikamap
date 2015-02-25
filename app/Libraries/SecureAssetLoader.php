<?php namespace App\Libraries;

class SecureAssetLoader {

	/**
	 * Returns an URI to a given asset which can be either 
	 * http or https depending on the current configuration.
	 * @param string Relative URI of the asset.
	 */		
	public static function SecureAsset($uri) {
		if(env('APP_DEBUG')) {
			// Debugging mode, normal asset
			return asset($uri);
		} else {
			// Non-debugging mode, secure asset
			return secure_asset($uri);
		}
	}
}