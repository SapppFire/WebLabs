<?php
session_start();
session_unset(); // Удаляет все данные сессии
session_destroy(); // Завершает сессию полностью
header("Location: registrationBefore.php"); // Редирект на страницу до авторизации
exit();
?>
