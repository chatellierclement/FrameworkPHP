<?php
class Fonctions {


	/******** Fonctions externes ********/

	//fonction qui renvoie un tableau d'objet
	//en fonction de l'instance de la classe
	public function find() {
		$results = array();		
		$class = self::getClass();
		$table = self::getTableBdd($class);
		$attributs = self::getAttributs($class);	
		$pdo = ConnexionBDD::getInstance()->query("SELECT * FROM ". $table);
		foreach ($pdo->fetchAll(PDO::FETCH_ASSOC) as $r) {
			$class = self::getClass();
	  		foreach ($r as $key => $row) {
	  			$attribut = "set".ucfirst($key); 
	  			if (in_array($attribut,$attributs)) {
				    if (class_exists($key)) {
				    	$sousClass = self::findByIdSousClass($key, $row);
				    	$class->$attribut($sousClass);
				    } else {
				        $class->$attribut($row);  		
				    }
				}
	  		}	
	  		$results[] = $class;	
	  	}
  		return $results;	
	}

	//fonction qui renvoie un objet
	//en fonction de l'instance de la classe
	public function findById($id) {
		$class = self::getClass();
		return self::communFindById($class, $id);
	}

	/******** Fonctions internes ********/

	//fonction qui récupère le nom de la colonne PRIMARY KEY 
	//En fonction de la table en paramètre
	private function idBdd($table) {	
		$result = ConnexionBDD::getInstance()->query("SHOW KEYS FROM " . $table ." WHERE KEY_NAME = 'PRIMARY'");		
		$result = $result->fetch(PDO::FETCH_ASSOC);
		return Securite::bdd($result["Column_name"]);
	}

	//fonction qui récupère le nom de la table 
	//en fonction de la classe passé en paramètre
	//soit il prend le nom du GETTER nom de table
	//Sinon par défaut le nom de la classe
	private function getTableBdd($class) {
		if (empty($class->nomTable())) {
			$res = explode(" ", print_r($class,1))[0];
			return Securite::bdd($res);
		}
		return Securite::bdd($class->nomTable());
	}

	//fonction qui récupère le nom des setters 
	//en fonction de la classe passé en paramètre
	private function getAttributs($class) {
		$setters = array_filter(get_class_methods($class), function($method) {
    		return 'set' === substr($method, 0, 3);
		});
		return $setters;
	}

	//fonction qui récupère le nom de la classe
	//en fonction du string passé en paramètre 
	//si string est vide : il prend le nom de la classe instancié
	//sinon il prend le nom passé en paramètre
	private function getClass($string = null) {
		if (empty($string)) {
			$obj = get_class($this);
		} else {
			$obj = $string;
		}
		$class = new $obj();		
		return $class;
	}

	//fonction qui renvoie un sous objet
	//en fonction de la classe et de l'id passé en paramètre
	private function findByIdSousClass($class,$id) {
		$class = self::getClass($class);
		return self::communFindById($class, $id);
	}

	//fonction qui renvoie un sous objet
	private function communFindById($class, $id) {		
		$table = self::getTableBdd($class);
		$primary = self::idBdd($table);
		$attributs = self::getAttributs($class);
		$pdo = ConnexionBDD::getInstance()->query("SELECT * FROM " . $table. " WHERE " . $primary . "=" . Securite::bdd($id));
		$tableau = $pdo->fetch(PDO::FETCH_ASSOC);
	  	foreach ($tableau as $key => $row) {
	  		$attribut = "set".ucfirst($key); 
	  		if (in_array($attribut,$attributs)) {
			    if (class_exists($key)) {
				    $sousClass = self::findByIdSousClass($key, $row);
				    $class->$attribut($sousClass);
				} else {
				    $class->$attribut($row);  		
				}  		
			}
	  	}

  		return $class;
	}
}