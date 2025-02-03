<?php session_start();
require_once '../DB.php';
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $formData = $_POST;

    $fields = ['client','products'];
    $errors = [];

    $_SESSION['orders-errors']='';

    foreach($fields as $key => $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $errors[$field][]= 'Field is required';
        }
    }

    if (!empty($errors)){
        $errorMessages = '<ul>';
        foreach ($errors as $key => $error) {
            $to_string = implode(',', $error);
            $errorMessages = $errorMessages . "<li>$key : $to_string </li>";
        }
        $errorMessages = $errorMessages . '</ul>';
        $_SESSION['orders-errors'] = $errorMessages;
        header('Location: ../../orders.php');
        exit;
    }


}else{
    echo json_encode(
        ["error"=> 'Неверный запрос']
    );
}

?>