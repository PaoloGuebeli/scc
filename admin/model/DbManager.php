<?php

/**
 * Class DbManager
 * Ritorna un istanza del database per le diverse connessioni all'interno del sito.
 */

class DbManager
{

	static function getDb($dbName = DB_NAME, $dbHost = DB_HOST, $dbUser = DB_USER, $dbPass = DB_PASS){

		$dsn = 'mysql:dbname='.$dbName.';host='.$dbHost;

		try {
			$dbh = new PDO($dsn, $dbUser, $dbPass);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
		return $dbh;
	}
}