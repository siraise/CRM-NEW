<?php
    
if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = $_GET['id'];

    require_once '../../api/DB.php';

    echo $id;
    
    $stmt = $DB->prepare("DELETE FROM `orders` WHERE `id` = ?");
    $stmt->execute([$id]);

    header('Location:../../orders.php');


} else{
    header('Location:../../orders.php');
}