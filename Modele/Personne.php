<?php

class Personne extends Fonctions {	 

	private $_id;
	private $_nom;
	private $_prenom;

	public function nomTable() {
		return "";	
	}

	public function getId()
	{
	    return $this->_id;
	}

	public function getNom()
	{
	    return $this->_nom;
	}

	public function getPrenom()
	{
	    return $this->_prenom;
	}

	public function setId($id)
	{
      $this->_id = $id;
   	}

   	public function setNom($nom)
	{
      $this->_nom = $nom;
   	}

   	public function setPrenom($prenom)
	{
      $this->_prenom = $prenom;
   	}
}