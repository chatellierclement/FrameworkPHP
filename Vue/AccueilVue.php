<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  Accueil

  <?php
  		//foreach ($tabTest as $personne) {
  			echo Securite::html($personne->getNom()) . "<br>";
        echo Securite::html($personne->getAdresse()->getVille()) . "<br>";
        echo Securite::html($personne->getAdresse()->getParking()->getLieu()) . "<br>";
        echo Securite::html($personne->getAdresse()->getParking()->getVoiture()->getImmat()) . "<br>";
  	//	}

      echo '<br>--------';

    /*  foreach ($voitures as $voiture) {
        echo Securite::html($voiture->getImmat()). "<br>";
      }*/

      //echo Securite::html($tabTest2);
  ?>

</body>
</html>