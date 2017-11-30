<?php

//chargement des classes
require_once './Framework/Autoload\Autoload.php'; 
Autoloader::register(); 

$app = new App(new Routage);
$app->run();


