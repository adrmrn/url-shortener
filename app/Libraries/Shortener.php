<?php

namespace App\Libraries;

use DB;
use App\Link;

class Shortener
{
	public function createShortLink(array $request) {
		return new Link([
			'url' 			=> $this->encodeUrl($request['url']),
			'short_url' 	=> $this->setName($request['name']),
			'description'	=> $request['description']
		]);
	}

	// Set Link's name (short url)
	private function setName($requestName) {
		// Check if name is empty, if not then generate random string
		if (!isset($requestName) || empty($requestName)) {
			return $this->generateRandomName('short_url'); // Generate random string (name)
		}
			
		return $requestName;
	}

	// Generate random string (name) for link
	private function generateRandomName($attribute, $length = 6) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		do {
			$name = '';

		    for ($i = 0; $i < $length; $i++) {
		        $name .= $characters[rand(0, strlen($characters) - 1)];
		    }
		} while (!$this->isNameAvailable(null, $name));

	    return $name;
	}

	// Encode URL - Base64
	private function encodeUrl($url) {
		return base64_encode($url);
	}

	// Decode URL - Base64
	public static function decodeUrl($url) {
		return base64_decode($url);
	}

	// Validation
	public function isNameAvailable($attribute, $value, $parameters = null, $validator = null) {
		return DB::table('links')->where('short_url', $value)->count() === 0;
	}
}
