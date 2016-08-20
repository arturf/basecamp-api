<?php
namespace Basecamp;
use Basecamp\StorageSession;

class Storage {
	public static function get( $storage = 'session' ) {
		return new StorageSession();
	}
}