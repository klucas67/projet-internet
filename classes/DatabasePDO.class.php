<?php

    class DatabasePDO extends PDO {        
		
		private static $databasePDO=null;
		
		public static function getPDO(){
			if(is_null(static::$databasePDO)){
				$host="localhost";
				$dbname="project";
				$user="root";
				$pwd="root";
				try{
					static::$databasePDO = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				}
				catch(Exception $e){
					die('Error while connecting to MySQL.\n');
				}				
			}
			return static::$databasePDO;
		}
    }
?>