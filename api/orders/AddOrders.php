<?php session_start();
require_once '../DB.php';
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $formData = $_POST;

    $fields = ['name','description','price','stock'];
    $errors = [];

    $_SESSION['products-errors']='';

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
        $_SESSION['products-errors'] = $errorMessages;
        header('Location: ../../products.php');
        exit;
    }

    function clearData($input){
        $cleaned = strip_tags($input);
        $cleaned = trim ($cleaned);
        $cleaned = preg_replace('/\s+/',' ',$cleaned);
        return $cleaned;
    }
    foreach($formData as $key => $field){
    $formData[$key] = clearData($field);
    }

    $name = $formData['name'];
    $produckID= $db->query("
        SELECT id FROM products WHERE name='$name'
        ")->fetchAll();
    if (!empty($produckID)) {
        // Добавляем ошибку в массив ошибок
        $errors['name'][] = 'Товар с таким названием уже существует.';
        foreach ($errors as $key => $error) {
            $to_string = implode(',', $error);
            $errorMessages .= "$to_string";
        }
        $_SESSION['products-errors'] = $errorMessages;
        header('Location: ../../products.php');
        exit;
    }else{
        $db->prepare(
                "INSERT INTO `products` (`name`, `description`, `price`, `stock`) VALUES (?, ?, ?, ?)"
            )->execute([
                $formData['name'], 
                $formData['description'], 
                $formData['price'], 
                $formData['stock']
            ]);
        header('Location: ../../products.php');    
    }

}else{
    echo json_encode(
        ["error"=> 'Неверный запрос']
    );
}

?>