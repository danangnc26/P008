<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'Config.php';

Class Database{

	protected static $_connection;
	
	public static function open(){
		if(!self::$_connection){
			$dbhost 			= Config::getConfig('dbhost');
			$dbuser				= Config::getConfig('dbuser');
			$dbpassword 		= Config::getConfig('dbpassword');
			$dbname 			= Config::getConfig('dbname');
			self::$_connection 	= new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
			if(!self::$_connection){
				throw new Exception('Gagal melalukan koneksi ke database. '.mysql_error());
			}
		}
		return self::$_connection;
	}
	
	public static function close(){
		if(self::$_connection){
			mysql_close(self::$_connection);
		}
	}

}