<?php

require_once __dir__.DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."Controllers".DIRECTORY_SEPARATOR."homeController.php";

$controller = isset($_GET['c'])? $_GET['c'] : 'home';
$action = isset($_GET['a'])? $_GET['a'] : 'index';


switch ($controller){
  
  case 'home':
    $homeController = new homeController();
    switch ($action){
      case 'index':
        $homeController->index();
      break;
    }
  break;

}