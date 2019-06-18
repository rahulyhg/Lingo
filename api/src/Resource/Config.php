<?php

namespace App\Resource;

class Config {

	public static function isProd() {
		return false;
	}

	public static function dbConnection() {
		return self::isProd() ? [

		] : [
			'driver' => 'sqlite3',
			'database' => '../sqlitedb/lingo.sdb'
		];
	}

}