<?php

require_once __dir__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."Controleurs".DIRECTORY_SEPARATOR."homeControleur.php";
require_once __dir__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."Controleurs".DIRECTORY_SEPARATOR."connexionControleur.php";
require_once __dir__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."Controleurs".DIRECTORY_SEPARATOR."creerUnCompteControleur.php";
require_once __dir__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."Controleurs".DIRECTORY_SEPARATOR."createurControleur.php";

$controleur = isset($_GET['c'])? $_GET['c'] : 'home';
$action = isset($_GET['a'])? $_GET['a'] : 'index';

var_dump($controleur);
var_dump($action);

switch ($controleur){
  
  case 'home':
    $homeControleur = new homeControleur();
    switch ($action){
      case 'index':
        $homeControleur->index();
      break;

      case 'creerQuestionnaire':
        $homeControleur->creerQuestionnaire();
      break;

      case 'valider':
        $homeControleur->valider();
      break;
    }
  break;

  case 'connexion':
    $connexionControleur = new connexionControleur();
    switch ($action){
      case 'connexion':
        $connexionControleur->connexion();
      break;

      case 'creerUnCompte':
        $connexionControleur->creerUnCompte();
      break;
    }
  
  case 'creerUnCompte':
    $creerUnCompteControleur = new creerUnCompteControleur();
    switch ($action){
      case 'creerUnCompte':
        $creerUnCompteControleur->creerCompte();
      break;
    }
  
  case 'createur':
    $createurControleur = new createurControleur();
    switch ($action){
      case 'index':
        $createurControleur->index();
      break;

      case 'espacePerso':
        $createurControleur->espacePerso();
      break;

      case 'historique':
        $createurControleur->historique();
      break;

      case 'nouveauFormulaire':
        $createurControleur->nouveauFormulaire();
      break;
    }

}