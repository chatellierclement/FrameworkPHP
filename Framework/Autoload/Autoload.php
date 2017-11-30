<?php 

class Autoloader {

    
    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        $dirs = array(
            './Framework/',
            './Framework/Commun/',
            './Framework/Database/', 
            './Framework/Routing/', 
            './Framework/Security/',             
            './ModuleTest/Configuration/',        
            './ModuleTest/Controleur/',       
            './ModuleTest/Modele/',       
        );
       foreach( $dirs as $dir ) {
            if (file_exists($dir.strtolower($class).'.php')) {
                require_once($dir.strtolower($class).'.php');
                return;
            }
        }
    }

}