<?php

class Adresse extends Fonctions {	 

	private $_id;
	private $_rue;
	private $_ville;
	private $_parking;

	public function nomTable() {
		return "";	
	}

	public function getId()
	{
	    return $this->_id;
	}

	public function getRue()
	{
	    return $this->_rue;
	}

	public function getVille()
	{
	    return $this->_ville;
	}

	public function getParking()
	{
	    return $this->_parking;
	}

	public function setId($id)
	{
      $this->_id = $id;
   	}

   	public function setRue($rue)
	{
      $this->_rue = $rue;
   	}

   	public function setVille($ville)
	{
      $this->_ville = $ville;
   	}

   	public function setParking($parking)
	{
      $this->_parking = $parking;
   	}
}