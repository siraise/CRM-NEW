<?php


function AuthCheck($successPath = '', $errorPath  = '') {

    require_once 'DB.php';
    $_SESSION['token'] = '2a3h';
   

    if (!isset($_SESSION['token']) && $errorPath) {
        
        header("Location: $errorPath");
        
        return;
    }
 
    $token = $_SESSION['token'];

    $adminID = $DB-> query(
        "SELECT id FROM users WHERE token = '$token'"
    )->fetchAll();

    if (empty($adminID) && $errorPath) {
        header ("Location: $errorPath");
    }

    if(!empty($adminID) && $successPath){
    header ("Location: $successPath");
    }

    
     
}

?>
