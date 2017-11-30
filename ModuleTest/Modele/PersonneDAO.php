<?php

/*class PersonneDAO extends Fonctions {

	function nomTable() {
		return "";	
	} 

	function getAll() {	
		return $this->find();
		//return $this->findById(1);
	}


	function getOneByName($nom) {
		$nom = Securite::bdd($nom);
		
		$stmt = ConnexionBDD::getInstance()->prepare("SELECT * FROM PERSONNE WHERE nom = ?");		

		$personne = "";

		if ($stmt->execute(array($nom))) {
		  while ($row = $stmt->fetch()) {
		    $personne = $row[1];
		  }
		}

		return $personne;
	}
}*/