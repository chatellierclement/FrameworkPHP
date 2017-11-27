<?php

class AccueilControleur {

	public function IndexAction() {
			$personnes = new Personne;
			$tabTest = $personnes->find();

			$personne = $personnes->findById(1);
			ini_set('xdebug.var_display_max_depth', -1);
			ini_set('xdebug.var_display_max_children', -1);
			ini_set('xdebug.var_display_max_data', -1);
			var_dump($personne);
			/*$voiture = new VoitureAutreNomBDD;
			$voitures = $voiture->find();*/
			
			require_once 'Vue/AccueilVue.php';
	}

	public function Page1Action() {
			echo "Page1";
	}

	public function Page2Action($id, $id2) {
			echo "Page2 : param : " . $id . " " .$id2;
	}
}