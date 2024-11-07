<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['email1'])) {
    header("Location: registrationBefore.php");
    exit();
}

// Получаем имя изображения из параметра
$image = isset($_GET['img']) ? $_GET['img'] : '';

// Безопасная проверка существования изображения
$imagePath = __DIR__ . "/source/img/" . basename($image);
if (file_exists($imagePath)) {
    // Устанавливаем заголовок для изображения и выводим его содержимое
    header("Content-Type: image/jpeg"); // Подставьте правильный MIME-тип в зависимости от типа изображений (jpeg/png)
    readfile($imagePath);
} else {
    // Отображаем ошибку, если изображение не найдено
    http_response_code(404);
    echo "Изображение не найдено.";
}
