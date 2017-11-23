<?php

class AccueilControleur {

	public function IndexAction() {
			$p = new PersonneDAO;
			$tabTest = $p->getAll();
			$tabTest2 = $p->getOneByName("Chatellier");
			
			require_once 'Vue/AccueilVue.php';
	}

	public function Page1Action() {
			echo "Page1";
	}

	public function Page2Action($id, $id2) {
			echo "Page2 : param : " . $id . " " .$id2;
	}
}