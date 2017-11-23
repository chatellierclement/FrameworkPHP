<?php

class Redirection {
	
	public function redirect() {
		
		$routage = new Routage;
		$routes = $routage->getRoutes();

		if (empty($routes[$_SERVER["REQUEST_URI"]])) {
			$urlServeur = explode("/", $_SERVER["REQUEST_URI"]);

			foreach ($routes as $key => $route) {

				$urlSansParamTab = explode("/", $key);

				if (count($urlServeur) == count($urlSansParamTab)) {
					$verif = true;
					for ($i = 1; $i < count($urlServeur); $i++) {
						if (!preg_match("/({.*})/", $urlSansParamTab[$i])) {	
							if ($urlServeur[$i] != $urlSansParamTab[$i]) {
								$verif = false;	
								$param[] = array();								
							}
						} else {
							$param[] = $urlServeur[$i];
						}
					}	

					if ($verif) {
						$class = new $route[0](); 
						return call_user_func_array(array($class, $route[1]), $param);		
					}
				}	
				
			} 
			
			if (empty($verif)) {
	 			//page 404
				echo "404";
			} 
		} else {
			$route = $routes[$_SERVER["REQUEST_URI"]];
			$class = new $route[0]();
			return $class->$route[1]();
		}
	}
}

