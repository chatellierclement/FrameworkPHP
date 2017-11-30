<?php

class App {
	
	private $router;

	public function __construct ($router) {
		$this->router = $router;
	}

	public function run() {
		
		$routes = $this->router->get();

		$urlServeur = explode("/", $_SERVER["REQUEST_URI"]);
		$param = array();

		foreach ($routes as $route) {

			$urlSansParamTab = explode("/", $route->getUrl());

			if (count($urlServeur) == count($urlSansParamTab)) {
				$verif = true;
				for ($i = 1; $i < count($urlSansParamTab); $i++) {
					if (!preg_match("/({.*})/", $urlSansParamTab[$i])) {	
						if ($urlServeur[$i] != $urlSansParamTab[$i]) {
							$verif = false;	
							$param = array(); 						
						}
					} else {
						$param[] = $urlServeur[$i];
					}
				}	
				if ($verif) {
					$controller = $route->getController();
					$class = new $controller(); 
					return call_user_func_array(array($class, $route->getMethod()), $param);		
				}
			}	
		} 
		echo "404";	
	} 
}