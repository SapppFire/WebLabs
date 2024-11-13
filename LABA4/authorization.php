<?php
session_start();
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: main_website.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_main.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Авторизация - FORUMHOUSE</title>
    <link rel="shortcut icon" href="source/Logo.png" type="image/x-icon">
</head>
<body>
    <?php require_once 'Reg\headerREG.php' ?>
    <br>
    <h1 style="text-align: center">Авторизация</h1>
    <br>
    <div class="pattern">
        <form action="login.php" id="form" method="POST">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            <br>

            <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" name="password1" id="password-input" class="form-control" value="<?php if (isset($_POST['password1'])) echo $_POST['password1']?>" id="exampleInputPassword1">
    <label>
        <input type="checkbox" class="password-checkbox" id="show-password-checkbox"> Показать пароль
    </label>

    <script>
        const passwordInput = document.getElementById("password-input");
        const showPasswordCheckbox = document.getElementById("show-password-checkbox");

        showPasswordCheckbox.addEventListener("change", function () {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>

            <?php if (isset($_SESSION['message']))
                echo $_SESSION['message'];
            unset($_SESSION['message']); ?>

            <br>
            <br>

            <button type="submit" name="submit" class="btn btn-primary btn-login">Войти</button>

            <br>
            <br>

            <p>Нет аккаунта - <a href="registration.php" class="text-success fw-bold text-decoration-none">Зарегистрируйтесь</a></p>
        </form>
    </div>
</body>
</html>