<?php

class homeController {
    function valider(){

        $code = trim($_POST['code'] ?? '');
        $valider = trim($_POST['valider'] ?? '');

    }

    function creerQuestionnaire(){

    }
 
    function index(){
        //lien vers la vue
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'home.php');
    }
}
