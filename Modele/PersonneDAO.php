<?php

class PersonneDAO {

	function getAll() {	
		
		foreach ( ConnexionBDD::getInstance()->query('SELECT * FROM PERSONNE') as $personne)	{
  			$personnes[] = $personne[1];	
		}

		return $personnes;
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
}