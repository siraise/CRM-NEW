<?php

//Если ID существует и не пустой
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    // 1. Удалить пользователя по ид из таблицы clients
    require_once '../../api/DB.php';
    
    // Подготовленный запрос для безопасного удаления
    $stmt = $DB->prepare("DELETE FROM `clients` WHERE `id` = ?");
    $stmt->execute([$id]);

    // 2. Перекинуть на страницу clients.php
    header('Location: ../../clients.php');
    
}else{
    header('Location: ../../clients.php');
}

?>