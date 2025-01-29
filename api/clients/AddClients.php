<?php session_start();
require_once '../DB.php';
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
        $errorMessages = '<ul>';
        foreach ($errors as $key => $error) {
            $to_string = implode(',', $error);
            $errorMessages = $errorMessages . "<li>$key : $to_string </li>";
        }
        $errorMessages = $errorMessages . '</ul>';
        $_SESSION['clients-errors'] = $errorMessages;
        header('Location: ../../clients.php');
        exit;
    }

    function clearData($input){
        $cleaned = strip_tags($input);
        $cleaned = trim ($cleaned);
        $cleaned = preg_replace('/\s+/','',$cleaned);
        return $cleaned;
    }
    foreach($formData as $key => $field){
    $formData[$key] = clearData($field);
    }

    $phone = $formData['phone'];
    $userID= $db->query("
        SELECT id FROM clients WHERE phone='$phone'
        ")->fetchAll();
    if (!empty($userID)) {
        // Добавляем ошибку в массив ошибок
        $errors['phone'][] = 'Пользователь с таким номером телефона уже существует.';
        foreach ($errors as $key => $error) {
            $to_string = implode(',', $error);
            $errorMessages .= "$to_string";
        }
        $_SESSION['clients-errors'] = $errorMessages;
        header('Location: ../../clients.php');
        exit;
    }else{
        $db->prepare(
                "INSERT INTO `clients` (`name`, `email`, `phone`, `birthday`) VALUES (?, ?, ?, ?)"
            )->execute([
                $formData['full-name'], 
                $formData['email'], 
                $formData['phone'], 
                $formData['birth-date']
            ]);
        header('Location: ../../clients.php');    
    }

}else{
    echo json_encode(
        ["error"=> 'Неверный запрос']
    );
}

?>