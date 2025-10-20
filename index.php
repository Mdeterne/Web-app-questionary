<?php

require_once __dir__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."Controllers".DIRECTORY_SEPARATOR."homeController.php";

$controller = isset($_GET['c'])? $_GET['c'] : 'home';
$action = isset($_GET['a'])? $_GET['a'] : 'index';

var_dump($controller);
var_dump($action);

switch ($controller){
  
  case 'home':
    $homeController = new homeController();
    switch ($action){
      case 'index':
        $homeController->index();
      break;

      case 'creerQuestionnaire':
        $homeController->creerQuestionnaire();
      break;

      case 'valider':
        $homeController->valider();
      break;
    }
  break;

  case 'connexion':
    $connexionController = new connexionController();
    switch ($action){
      case 'connexion':
        $connexionController->connexion();
      break;

      case 'creerUnCompte':
        $connexionController->creerUnCompte();
      break;
    }

}