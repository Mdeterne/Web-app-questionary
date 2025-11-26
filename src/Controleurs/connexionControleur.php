<?php

class connexionControleur{

    function index(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'connexion'.DIRECTORY_SEPARATOR.'connexion.php');
    }

    function connexion(){
        // Get form data with proper field names
        $username = isset($_POST['nom_utilisateur']) ? trim($_POST['nom_utilisateur']) : '';
        $password = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';
        
        // Basic input validation
        if (empty($username) || empty($password)) {
            // Redirect back with error
            header('Location: ?c=connexion&a=index&error=empty_fields');
            exit;
        }
        
        // TODO: Add database authentication
        // For now, redirect to personal space (mock success)
        // In production: verify credentials against database using password_verify()
        
        // Start session and store user info
        session_start();
        $_SESSION['user'] = $username;
        
        header('Location: ?c=espacePerso&a=index');
        exit;
    }
}