<?php

require 'Configuration\autoload.php'; 
Autoloader::register(); 

$redirection = new Redirection;
$routes = $redirection->redirect();


