<?php session_start();

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $formData = $_POST;

    $fields = ['full-name','email','phone','birth-date'];
    $errors = [];

    $_SESSION['clients-errors']='';

    foreach($fields as $key => $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $errors[$field][]= 'Field is required';
        }
    }

    if (!empty($errors)){
        $_SESSION['clients-errors']=  json_encode($errors);
        header('Location: ../../clients.php');
        exit;
    }
// Проверить пришли ли данные
// фильтрация данных
// Проверить есть ли такой клиент в базе данных SQL
// записть клиента
}else{
    echo json_encode(
        ["error"=> 'Неверный запрос']
    );
}

?>