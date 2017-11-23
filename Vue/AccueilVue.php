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
  		foreach ($tabTest as $a) {
  			echo Securite::html($a);
  		}

      echo '--------';

      echo Securite::html($tabTest2);
  ?>

</body>
</html>