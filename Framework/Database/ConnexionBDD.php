<?php

class ConnexionBDD {

	private $PDOInstance = null;
	private static $instance = null;

	private function __construct()  {
		$this->init();
	}	

	public static function getInstance()  {  
	    if(is_null(self::$instance))
	    {
	      self::$instance = new ConnexionBDD();
	    }
    	return self::$instance->PDOInstance;
 	}

 	private function init() {
 		try {
			$ini_array = parse_ini_file("ModuleTest\Configuration\propertiesBDD.ini");

	    	$this->PDOInstance =  new PDO('mysql:host='.$ini_array["server"].';dbname='.$ini_array["bdd"].';charset=utf8', $ini_array["user"], $ini_array["password"]);
	    } catch (Exception $e) {
	    	die('Erreur : ' . $e->getMessage());
	    }
 	}
}