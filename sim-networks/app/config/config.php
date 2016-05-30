<?php
namespace App\Config;

	class Config {
		protected static $_instance;
		protected static $dbHost = 'watchsto.mysql.ukraine.com.ua';
		protected static $dbLogin = 'watchsto_testmir';
		protected static $dbName = 'watchsto_testmir';
		protected static $dbPass = 'cslb9vx2';

	    private function __construct() {        
		}

	    public static function getDbHost() {
	        return self::$dbHost;
	    }
	   
	  
	    public static function getDbLogin() {
	        return self::$dbLogin;
	    }
	  
	    public static function getDbName() {
	        return self::$dbName;
	    }
	  
	    public static function getDbPass() {
	        return self::$dbPass;
	    }
	  
	    private function __clone() {
	    }

	    private function __wakeup() {
	    }
	}
?>
