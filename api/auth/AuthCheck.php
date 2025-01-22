<?php
function AuthCheck($successPath = '', $errorPath = '') {
   
    require_once 'api/DB.php';
    

    // if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {

    //     // Если токен валиден, редиректим на успешный путь
    //     header("Location: $successPath");
    //     exit();
    // } else {
    //     // Если токен отсутствует или пустой, редиректим на путь ошибки
    //     header("Location: $errorPath");
    //     exit();
    // }

    if (!isset($_SESSION['token']) &&  $errorPath) {
        header("Location: $errorPath");
        return;
    }
    $token=$_SESSION['token'];
    $adminID= $db->query(
        "SELECT id FROM users WHERE token='$token'"
    )->fetchAll();
    
    if (empty($adminID) && $errorPath){
        header("Location: $errorPath");
    }
    if (!empty($adminID) && $successPath){
        header("Location: $successPath");
    }

    // echo json_encode ($adminID);

}

?>
