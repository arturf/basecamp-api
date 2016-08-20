<?php
namespace Basecamp;

class StorageSession {
	public function __construct() {
		if (session_status() == PHP_SESSION_NONE) {
			session_id('AtHe3hAtuP');
			session_start();
		}
	}

	public function get( $hash ) {
		return $_SESSION['basecamp'][$hash];
	}

	public function put( $hash, $etag ) {
		$_SESSION['basecamp'][$hash] = $etag;
	}
}