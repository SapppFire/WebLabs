<?php session_start(); ?>
<?php 
    require_once "textlogic.php";
    require_once "presets.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style_main.css" rel="stylesheet">
    <link href="../css/style_header.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Фермерское хозяйство: организация, регистрация и ведение - Темы недели - Журнал - FORUMHOUSE</title>
    <link rel="shortcut icon" href="../source/Logo.png" type="image/x-icon">
    <style>
    .highlight {
        background-color: yellow;
    }
</style>
</head>
<body>
<?php include "../header.php"; ?>  <br><br><br>
<style> 
form{width: 90%}
</style>

    <div class="container">
        <br>
        <form method="GET">
            <button type="submit" name="preset" value="1" class="btn btn-dark">Preset 1</button>
            <button type="submit" name="preset" value="2" class="btn btn-dark">Preset 2</button>
            <button type="submit" name="preset" value="3" class="btn btn-dark">Preset 3</button>
            <button type="submit" name="preset" value="4" class="btn btn-dark">Test</button>
        </form>
        <br>
        <form method="POST" action="text.php">
            <textarea type="text" id="textarea" name="textarea" class="w-100 form-control" style="height: 300px;"><?php echo $text; ?></textarea>
            <br>
            <button type="submit" name="lesgooo" class="btn btn-secondary">Отправить</button>
            <button type="submit" name="clear" class="btn btn-danger">Очистить</button>
        </form>
        <br>
        <?php 
            if (isset($_POST['lesgooo'])) {
                ?> 
                <button class="btn btn-primary" onclick="document.getElementById(`task4`).scrollIntoView()">Задание 4</button>
                <button class="btn btn-primary" onclick="document.getElementById(`task7`).scrollIntoView()">Задание 7</button>
                <button class="btn btn-primary" onclick="document.getElementById(`task11`).scrollIntoView()">Задание 11</button>
                <button class="btn btn-primary" onclick="document.getElementById(`task18`).scrollIntoView()">Задание 18</button>
                <?php
                task4($xml);
                ?> <div style="height: 200px;"></div> <?php
                task7($xml);
                ?> <div style="height: 200px;"></div> <?php
                task11($xml);
                ?> <div style="height: 200px;"></div> <?php
                task18($xml);
                ?> <div style="height: 200px;"></div> <?php
            } 
        ?>
    </div>
</body>
</html>









