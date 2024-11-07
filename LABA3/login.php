<?php
session_start();
require_once 'connect_to_db.php';

$email1 = isset($_POST["email1"]) ?  trim($_POST["email1"]) : '';
$password1 = md5($_POST["password1"]);

if (isset($_POST['submit'])) {
    $stmt = $connect->prepare("SELECT * FROM plants_db.users WHERE email1 = :email1 AND password1 = :password1");
    $stmt -> bindValue('email1', $email1, PDO::PARAM_STR);
    $stmt -> bindValue('password1', $password1, PDO::PARAM_STR);
    $stmt -> execute();
    $users = $stmt -> fetchAll();

    if (!empty($users)) {
        $check_user = $users[0];
        $_SESSION['email1'] = $check_user['email1'];
        header("Location: main_website.php");
    } else {
        $_SESSION['message'] = "Неверный логин или пароль";
        header("Location: authorization.php");
        echo 'Не верный логин или пароль';
    }
}