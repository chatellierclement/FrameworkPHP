<?php

class Route {	 

	private $_name;
	private $_url;
	private $_controller;	
	private $_method;

	public function __construct($_name,$_url, $_controller, $_method) {        
        $this->_name = $_name;
        $this->_url = $_url;
		$this->_controller = $_controller;	
		$this->_method = $_method;
    }

	public function getName()
	{
	    return $this->_name;
	}

	public function getUrl()
	{
	    return $this->_url;
	}

	public function getController()
	{
	    return $this->_controller;
	}

	public function getMethod()
	{
	    return $this->_method;
	}
}