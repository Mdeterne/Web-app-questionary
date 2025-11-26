<?php

class creerUnCompteControleur{

    function index(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'creation_compte'.DIRECTORY_SEPARATOR.'creation_compte.php');
    }
    
    function creerCompte(){
        // Get form data with proper field names
        $email = isset($_POST['adresse_email']) ? trim($_POST['adresse_email']) : '';
        $username = isset($_POST['nom_utilisateur']) ? trim($_POST['nom_utilisateur']) : '';
        $password = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';
        $passwordConfirm = isset($_POST['mot_de_passe_confirm']) ? $_POST['mot_de_passe_confirm'] : '';
        
        // Basic validation
        if (empty($email) || empty($username) || empty($password)) {
            header('Location: ?c=creerUnCompte&a=index&error=empty_fields');
            exit;
        }
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ?c=creerUnCompte&a=index&error=invalid_email');
            exit;
        }
        
        // Verify passwords match
        if ($password !== $passwordConfirm) {
            header('Location: ?c=creerUnCompte&a=index&error=password_mismatch');
            exit;
        }
        
        // Hash the password securely
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        // TODO: Insert into database
        // $pdo->prepare("INSERT INTO users (email, password_hash, full_name) VALUES (?, ?, ?)")
        //     ->execute([$email, $passwordHash, $username]);
        
        // Redirect to login page on success
        header('Location: ?c=connexion&a=index&success=account_created');
        exit;
    }
}
