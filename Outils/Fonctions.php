<?php

class Fonctions {

	public function find() {
		$results = array();
		$table = self::getTableBdd();
		$attributs = self::getAttributs();	
		$pdo = ConnexionBDD::getInstance()->query("SELECT * FROM ". $table);

		foreach ($pdo->fetchAll(PDO::FETCH_ASSOC) as $r) {
			$class = self::getClass();
	  		foreach ($r as $key => $row) {
	  			$attribut = "set".ucfirst($key); 
	  			if (in_array($attribut,$attributs)) {
				    $class->$attribut($row);  		
				}
	  		}	
	  		$results[] = $class;	
	  	}
  		return $results;	
	}

	public function findById($id) {
		$table = self::getTableBdd();
		$primary = self::idBdd($table);
		$result = ConnexionBDD::getInstance()->query("SELECT * FROM " . $table. " WHERE " . $primary . "=" . Securite::bdd($id));
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	private function idBdd($table) {		
		$table = self::getTableBdd();
		$result = ConnexionBDD::getInstance()->query("SHOW KEYS FROM " . $table ." WHERE KEY_NAME = 'PRIMARY'");		
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return Securite::bdd($result["Column_name"]);
	}

	private function getTableBdd() {
		$class = self::getClass();	
		if (empty($class->nomTable())) {
			$res = explode(" ", print_r($class,1))[0];
			return Securite::bdd($res);
		}
		return Securite::bdd($class->nomTable());
	}

	private function getAttributs() {
		$class = self::getClass();
		$setters = array_filter(get_class_methods($class), function($method) {
    		return 'set' === substr($method, 0, 3);
		});

		return $setters;
	}

	private function getClass() {
		$obj = get_class($this);
		$class = new $obj();		
		return $class;
	}

}