<?php
	function connect(){
		try {
			$params = parse_ini_file('../internal/database.ini');
			if ($params === false) {
				throw new \Exception("Error reading database configuration file");
			}
			$conStr = sprintf("mysql:host=%s;port=%d;dbname=%s;charset=utf8", 
				$params['host'], 
				$params['port'], 
				$params['database']);
			$db = new \PDO($conStr, $params['user'], $params['password']);
			$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $db;
			
		}
		catch(PDOException | Exception $err) {
			throw $err;
		}
	}
?>