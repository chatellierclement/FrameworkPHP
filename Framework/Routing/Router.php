<?php

class Router {

	private $_route;

	public function addRoute($name,$url,$controller,$method) {
		$this->_route[] = new Route($name,$url,$controller,$method);
	}

	public function get() {
		return $this->_route;
	}
}