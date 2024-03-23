<?php
	function connect(){
			try {
				$params = parse_ini_file('../internal/database.ini');
			if ($params === false) {
				throw new \Exception("Error reading database configuration file");
			}
			$conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s", 
                $params['host'], 
                $params['port'], 
                $params['database'], 
                $params['user'], 
                $params['password']);
			$db = new \PDO($conStr);
			$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $db;
			
		}
		catch(PDOException | Exception $err) {
			throw $err;
		}
	}
?>