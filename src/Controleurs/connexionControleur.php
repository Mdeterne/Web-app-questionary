<?php

class connexionControleur{
    function connexion(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username;
        echo $password;
    }

    function creerUnCompte(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'creation_compte'.DIRECTORY_SEPARATOR.'creation_compte.php');
    }
}