<?php

class ConnexionBDD {

	private $PDOInstance = null;
	private static $instance = null;

	private function __construct()  {
		try {
			$ini_array = parse_ini_file("propertiesBDD.ini");

	    	$this->PDOInstance =  new PDO('mysql:host='.$ini_array[0].';dbname='.$ini_array[1].';charset=utf8', $ini_array[2], $ini_array[3]);
	    } catch (Exception $e) {
	    	die('Erreur : ' . $e->getMessage());
	    }
	}	

	public static function getInstance()  {  
	    if(is_null(self::$instance))
	    {
	      self::$instance = new ConnexionBDD();
	    }
    	return self::$instance->PDOInstance;
 	}
}