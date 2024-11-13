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
    <title>Регистрация - FORUMHOUSE</title>
    <link rel="shortcut icon" href="source/Logo.png" type="image/x-icon">
</head>
<body>
<?php require_once 'Reg/headerREG.php'?>
<br>
    <h1 style="text-align: center">Регистрация</h1>
    <br>
    <div class="pattern">
        <form action="signup.php" id="form" method="POST">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="email1" class="form-control" id="exampleInputEmail1" value="<?php if (isset($_POST['email1'])) echo htmlspecialchars($_POST['email1']) ?>" aria-describedby="emailHelp">

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

            <div class="form-text">Пароль должен содержать не менее 6 символов, хотя бы одну цифру, строчные/заглавные буквы и специальные символы</div>

            <br>

            <label for="exampleInputPassword1">Подтверждение пароля</label>
            <input type="password" name="password_conf" class="form-control" id="exampleInputPassword1">

            <br>

            <label for="">ФИО</label>
            <input type="text" name="full_name" class="form-control" aria-describedby="emailHelp">

            <br>

            <label for="">Дата рождения</label>
            <input type="date" name="address" class="form-control" aria-describedby="emailHelp">

            <br>

            <label for="">Адрес</label>
            <input type="text" name="birthday_date" class="form-control" aria-describedby="emailHelp">

            <br>

            <label for="sex">Пол</label>
            <select name="sex" id="sex" class="form-control">
            <option value="мужчина">Мужчина</option>
            <option value="женщина">Женщина</option>
            </select>

            <br>

            <label for="">Интересы</label>
            <input type="text" name="interests" class="form-control">

            <br>

            <label for="">Ссылка на ВК</label>
            <input type="text" name="vklink" class="form-control">

            <br>

            <label for="blood_type">Группа крови</label>
            <select name="blood_type" id="blood_type" class="form-control">
            <option value="Первая">Первая</option>
            <option value="Вторая">Вторая</option>
            <option value="Третья">Третья</option>
            <option value="Четвертая">Четвертая</option>
            </select>

            <br>

            <label for="rh_factor">Резус-фактор</label>
            <select name="rh_factor" id="rh_factor" class="form-control">
            <option value="Положительный">Положительный</option>
            <option value="Отрицательный">Отрицательный</option>
            </select>

            <?php if (isset($_SESSION['message']))
                echo $_SESSION['message'];
            unset($_SESSION['message']); ?>

            <br>
            <br>

            <button  type="submit" name="submit" class="btn btn-primary">Зарегистрироваться</button>
            У вас уже есть аккаунт? - <a href="authorization.php">Авторизуйтесь</a>

            <br>
            <br>
        </form>
    </div>
</body>
</html>
