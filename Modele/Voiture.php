<?php

class Voiture extends Fonctions {	 

	private $_id;
	private $_immat;
	//private $_marque;
	//private $_type;

	public function nomTable() {
		return "";	
	}

	public function getId()
	{
	    return $this->_id;
	}

	public function getImmat()
	{
	    return $this->_immat;
	}

	/*public function getMarque()
	{
	    return $this->_marque;
	}

	public function getType()
	{
	    return $this->_type;
	}*/

	public function setId($id)
	{
      $this->_id = $id;
   	}

   	public function setImmat($immat)
	{
      $this->_immat = $immat;
   	}

   	/*public function setMarque($marque)
	{
      $this->_marque = $marque;
   	}

   	public function setType($type)
	{
      $this->_type = $type;
   	}*/
}