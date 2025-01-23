<?php

function logoutUser($redirect, $db, $token = ''){

    unset($_SESSION['token']);

    if($token){
        // очистить токен пользователю у которого login=$login AND password=$password
        $db->query("
        UPDATE `users` SET token = NULL
        WHERE token = '$token'
        ")->fetchAll();
    }

    header("Location: $redirect");}
?>