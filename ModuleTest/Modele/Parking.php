<?php

class Parking extends Fonctions {	 

	private $_id;
	private $_lieu;
	private $_voiture;

	public function nomTable() {
		return "";	
	}

	public function getId()
	{
	    return $this->_id;
	}

	public function getLieu()
	{
	    return $this->_lieu;
	}

	public function getVoiture()
	{
	    return $this->_voiture;
	}

	public function setId($id)
	{
      $this->_id = $id;
   	}

   	public function setLieu($lieu)
	{
      $this->_lieu = $lieu;
   	}

   	public function setVoiture($voiture)
	{
      $this->_voiture = $voiture;
   	}
}