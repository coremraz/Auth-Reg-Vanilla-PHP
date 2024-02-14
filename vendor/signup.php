<?php
session_start();
require_once "connect.php";

$full_name = $_POST["fio"];
$login = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_confirm = $_POST["confirm-password"];

if ($password == $password_confirm) {
    $path = 'uploads/' .  time() . $_FILES["profile-image"]["name"];
    if(!move_uploaded_file($_FILES["profile-image"]["tmp_name"], "../".$path)) {
        $_SESSION["message"] = "Ошибка при загрузке изображения!";
        header('Location: ../register.php');
    }

    //добавить валидацию и шифр, проверку на уникальность логина
    try {
        mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) 
                        VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");
    }catch (mysqli_sql_exception $e) {
        if( strpos($e->getMessage(), "Duplicate entry") === 0)  {
            $_SESSION["message"] = "Логин не уникален";
            header('Location: ../register.php');
        };
        exit();
    }

    $_SESSION["message"] = "Регистрация прошла успешно!";
    header('Location: ../index.php');
} else {
        $_SESSION["message"] = "Пароли не совпадают!";
    header('Location: ../register.php');
}

