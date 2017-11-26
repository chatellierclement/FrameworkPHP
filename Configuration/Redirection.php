<?php

class Redirection {
	
	public function redirect() {
		
		$routage = new Routage;
		$routes = $routage->getRoutes();

		$urlServeur = explode("/", $_SERVER["REQUEST_URI"]);
		$param = array();
			
		foreach ($routes as $key => $route) {

			$urlSansParamTab = explode("/", $key);

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
					$class = new $route[0](); 
					return call_user_func_array(array($class, $route[1]), $param);		
				}
			}	
		} 
		echo "404";	
	} 
}