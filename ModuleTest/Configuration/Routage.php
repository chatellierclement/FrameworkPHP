<?php

class Routage extends Router {	

	public function __construct() {
		$siteName = "/Framework";
		$this->addRoute("Accueil", $siteName.'/', 'AccueilControleur', "IndexAction");
		$this->addRoute("Page1", $siteName.'/Page1', 'AccueilControleur', "Page1Action");
		$this->addRoute("Page2", $siteName.'/Page2/{id}/{id2}', 'AccueilControleur', "Page2Action");
	}
}