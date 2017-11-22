<?php

class Redirection {
	
	public function redirect() {
		
		$routage = new Routage;
		$routes = $routage->getRoutes();

		if (empty($routes[$_SERVER["REQUEST_URI"]])) {
			//page 404
			echo "404";
		} else {
			$route = $routes[$_SERVER["REQUEST_URI"]];
			$class = new $route[0]();
			return $class->$route[1]();
		}
	}
}

