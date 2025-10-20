<?php

class homeController {
    function valider(){

        $code = trim($_POST['code'] ?? '');

        

    }

    function creerQuestionnaire(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'connexion'.DIRECTORY_SEPARATOR.'home.php');
    }
 
    function index(){
        //lien vers la vue
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Accueil'.DIRECTORY_SEPARATOR.'home.php');
    }
}
