<?php
session_start();
require_once '../DB.php';
if ($_SERVER['REQUEST_METHOD']==='POST'){
    
    $login = isset($_POST ['username']) ? $_POST ['username'] : '';
    $password = isset($_POST ['password']) ? $_POST ['password'] : '';
    $errors= [];
    
    $_SESSION['login-errors']= [];

    if (!$login){
        $_SESSION['login-errors']['login']=
        'Field is required';
    }
    if (!$password){
        $_SESSION['login-errors']['password']=
        'Field is required';
    }
    if (!$login || !$password){
        header("Location: ../../login.php");
        exit;
    }

    // Функция для фильтрации данных
    function clearData($input){
        $cleaned = strip_tags($input);
        $cleaned = trim ($cleaned);
        $cleaned = preg_replace('/\s+/','',$cleaned);
        return $cleaned;

    }
    $login = clearData($login);
    $password = clearData($password);
    //сделать проверку логина
    $userID= $db->query(
    "SELECT id FROM users WHERE login='$login'"
    )->fetchAll();

    if (empty($userID)){
        $_SESSION['login-errors']['login']=
        'User not found';
        header("Location: ../../login.php");
    }

    $userID= $db->query(
        "SELECT id FROM users WHERE login='$login' AND password='$password'"
        )->fetchAll();


    if (empty($userID)){
        $_SESSION['login-errors']['password']=
        'Wrong password';
        header("Location: ../../login.php");
        exit;
    }
    
    $uniquerString = time();
    $token = base64_encode(
        "login='$login'&password='$password'&unique=$uniquerString"
    );
    $db->query("
        UPDATE `users` SET token='$token' 
        WHERE login = '$login' AND password = '$password'
        ")->fetchAll();

    $_SESSION['token']=$token;
    header("Location: ../../clients.php");  
    
}else{
    echo json_encode([
        "error"=>'Неверный запрос'
    ]); 
}

    
 
?>