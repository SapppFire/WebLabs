<?php
session_start();
require_once 'connect_to_db.php';

$email1 = isset($_POST["email1"]) ?  trim($_POST["email1"]) : '';
$password1 = isset($_POST["password1"]) ? ($_POST["password1"]) : '';
$full_name = isset($_POST["full_name"]) ?  trim($_POST["full_name"]) : '';
$birthday_date = isset($_POST["birthday_date"]) ?  trim($_POST["birthday_date"]) : '';
$address = isset($_POST["address"]) ?  trim($_POST["address"]) : '';
$sex = isset($_POST["sex"]) ?  trim($_POST["sex"]) : '';
$interests = isset($_POST["interests"]) ?  trim($_POST["interests"]) : '';
$vklink = isset($_POST["vklink"]) ?  trim($_POST["vklink"]) : '';
$blood_type = isset($_POST["blood_type"]) ?  trim($_POST["blood_type"]) : '';
$rh_factor = isset($_POST["rh_factor"]) ?  trim($_POST["rh_factor"]) : '';



if (isset($_POST['submit'])) {
    $err = array();

    // Сохраняем и очищаем все поля
    $email1 = isset($_POST['email1']) ? trim($_POST['email1']) : '';
    $password1 = isset($_POST['password1']) ? trim($_POST['password1']) : '';
    $password_conf = isset($_POST['password_conf']) ? trim($_POST['password_conf']) : '';
    $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $birthday_date = isset($_POST['birthday_date']) ? trim($_POST['birthday_date']) : '';

    // Проверка на пустоту обязательных полей
    if (empty($email1) || empty($password1) || empty($password_conf) || empty($full_name) || empty($address) || empty($birthday_date)) {
        $_SESSION['message'] = "Заполните все обязательные поля!";
        header("Location: registration.php");
        exit();
    }
    // проверям логин
    if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])[0-9a-zA-Z!@#$%^&*_-]{6,}$/", $password1)) {
        array_push($err, "Пароль не соответствует требованиям");
        $_SESSION['message'] = implode('', $err);
        header("Location: registration.php");
    }
    

    elseif (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
        array_push($err, "Email не может быть такого формата ");
        $_SESSION['message'] = implode('', $err);
        header("Location: registration.php");
    }
    else {
        $password_conf = $_POST["password_conf"];

        if ($password1 === $password_conf) {
            $password1 = md5($password1);
        } else {
            array_push($err, "Пароли не совпадают");
            $_SESSION['message'] = implode('', $err);
            header("Location: registration.php");
        }

        $stmt = $connect -> prepare("SELECT * FROM plants_db.users WHERE email1 =:email1");
        $stmt -> bindValue('email1', $email1, PDO::PARAM_STR);
        $stmt -> execute();
        $check_user = $stmt -> fetchAll();

        if(count($check_user) > 0) {
            array_push($err, "Пользователь с таким логином уже существует в базе данных");
            $_SESSION['message'] = implode('', $err);
            header("Location: registration.php");
        }

        if (count($err) == 0) {
            $stmt = $connect->prepare("INSERT INTO plants_db.users(email1, password1, full_name, birthday_date, address, sex, interests, vklink, blood_type, rh_factor) VALUES(:email1, :password1, :full_name, :birthday_date, :address, :sex, :interests, :vklink, :blood_type, :rh_factor)");
            $stmt->bindValue('email1', $email1, PDO::PARAM_STR);
            $stmt->bindValue('password1', $password1, PDO::PARAM_STR);
            $stmt->bindValue('full_name', $full_name, PDO::PARAM_STR);
            $stmt->bindValue('birthday_date', $birthday_date, PDO::PARAM_STR);
            $stmt->bindValue('address', $address, PDO::PARAM_STR);
            $stmt->bindValue('sex', $sex, PDO::PARAM_STR);
            $stmt->bindValue('interests', $interests, PDO::PARAM_STR);
            $stmt->bindValue('vklink', $vklink, PDO::PARAM_STR);
            $stmt->bindValue('blood_type', $blood_type, PDO::PARAM_STR);
            $stmt->bindValue('rh_factor', $rh_factor, PDO::PARAM_STR);
            $stmt->execute();
            $_SESSION['message'] = "Регистрация прошла успешно";
            header("Location: authorization.php");
        }
    }
}

if (isset($_SESSION['message'])) print_r($_SESSION['message']);

