<?php

session_start();
require_once "connect.php";

$login = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

//идем в базу и проверяем есть ли такой логин
$check_user = mysqli_query($connect, "SELECT * FROM `users` where `login` = '$login'");

if (mysqli_num_rows($check_user) > 0) {

    //записываем юзера в отдельную переменную
    $user = mysqli_fetch_assoc($check_user);
    $storedPassword = $user["password"];

    //проверяем пароль
    if (password_verify($password, $storedPassword)) {

        $_SESSION["user"] = [
            "id" => $user["id"],
            "full_name" => $user["full_name"],
            "email" => $user["email"],
            "avatar" => $user["avatar"]
        ];

        header('Location: ../profile.php');
    } else {
        $_SESSION["message"] = "Неверный логин или пароль!";
        header('Location: ../index.php');
    }

} else {
    $_SESSION["message"] = "Неверный логин или пароль!";
    header('Location: ../index.php');
}