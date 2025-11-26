<?php

class homeControleur {
    function valider(){
        // Sanitize and validate the PIN
        $pin = isset($_POST['pin']) ? trim($_POST['pin']) : '';
        
        // Validate PIN format (should be numeric, typically 6 digits)
        if (empty($pin) || !preg_match('/^[0-9]{4,8}$/', $pin)) {
            // Invalid PIN format - redirect back with error
            header('Location: ?c=home&a=index&error=invalid_pin');
            exit;
        }
        
        // TODO: Look up PIN in database
        // $stmt = $pdo->prepare("SELECT id FROM surveys WHERE access_pin = ? AND status = 'active'");
        // $stmt->execute([$pin]);
        // $survey = $stmt->fetch();
        
        // if ($survey) {
        //     header('Location: ?c=questionnaire&a=index&q=' . $survey['id']);
        //     exit;
        // }
        
        // PIN not found - redirect back with error
        header('Location: ?c=home&a=index&error=pin_not_found');
        exit;
    }
 
    function index(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Acceuil'.DIRECTORY_SEPARATOR.'home.php');
    }
}
