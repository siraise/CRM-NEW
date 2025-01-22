<?php 

session_start();
require_once 'api/auth/AuthCheck.php';
AuthCheck('clients.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автоматизация</title>
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/login.css">
</head>
<body>
    <div class="container">
        <h2>Вход</h2>
        <form action="api/auth/AuthUser.php" method="POST">
            <label for="username">Логин</label>
            <input type="text" id="username" name="username" placeholder="Введите логин" >
            <p class="error">
                <?php
                    if (isset($_SESSION['login-errors'])){
                        $errors =$_SESSION['login-errors'];
                        echo isset($errors['login']) ?  $errors ['login'] : '';
                }
                ?>
            </p>
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" placeholder="Введите пароль" >
            <p class="error">
                <?php
                    if (isset($_SESSION['login-errors'])){
                        $errors =$_SESSION['login-errors'];
                        echo isset($errors['password']) ?  $errors['password'] : '';
                }
                ?>
            </p>   
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>