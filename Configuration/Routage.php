<?php

class Routage {	

	public function getRoutes() {
		return $this->initRoutes();
	}

	private function initRoutes() {	
		$siteName = '/Framework';
		$routes = array (
		    $siteName.'/' => array ('AccueilControleur', "IndexAction"),
		    $siteName.'/Page1' => array ('AccueilControleur', "Page1Action"),
		    $siteName.'/Page2/{id}/{id2}' => array ('AccueilControleur', "Page2Action")

		);

		return $routes;
	}
}