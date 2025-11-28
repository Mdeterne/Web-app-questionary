<?php
require_once __DIR__ . '/../../lib/CAS/CAS.php'; 

// Configuration du serveur CAS unilim.fr
$cas_host = 'cas.unilim.fr';
$cas_context = '/cas'; // Contexte standard pour unilim
$cas_port = 443; // HTTPS
$cas_version = CAS_VERSION_2_0;
$service_base_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

// Initialisation de phpCAS
phpCAS::client($cas_version, $cas_host, $cas_port, $cas_context, $service_base_url);



// Vérification stricte du certificat 
// phpCAS::setCasServerCACert('/path/to/ca-certificate.crt');

// Désactiver la vérification (développement uniquement)
phpCAS::setNoCasServerValidation();

// Forcer l'authentification
phpCAS::forceAuthentication();

// Récupérer les données de l'utilisateur authentifié
$user = phpCAS::getUser();
var_dump($user);

?>