<?php session_start(); ?>
<?php if (empty($_SESSION['email1'])) header ('Location: authorization.php'); ?>
<!DOCTYPE html>
<html>
    <!-- 20 ВАРИАНТ -->
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_main.css" rel="stylesheet">
    <link rel="stylesheet" href="css/exp_imp_page.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Фермерское хозяйство: организация, регистрация и ведение - Темы недели - Журнал - FORUMHOUSE</title>
    <link rel="shortcut icon" href="source/Logo.png" type="image/x-icon">
</head>
<body>
<?php require_once('header.php'); ?>
<div class="export_and_import">
    <div class="export">
        <form action="vendor/export_logic.php" method="POST">
            <label for="">Экспорт в CSV файл на сервер</label>
            <br>
            <button type="submit" class="btn btn-info mt-2">Экспорт</button>
        </form>
    </div>

    <div class="import">
        <form action="vendor/import_logic_two.php" method="POST" enctype="multipart/form-data">
            <label for="upload-file">Загрузите ваш CSV файл</label>
            <input type="file" name="file" class="form-control" accept=".csv">
            <button type="submit" class="btn btn-info mt-2">Импорт</button>
        </form>
    </div>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['source']) && isset($_GET['table']) && isset($_GET['count'])): ?>
        <div class="alert alert-success">
            Файл с данными получен из <?php echo htmlspecialchars($_GET['source']); ?> и обработан. 
            Создана таблица <?php echo htmlspecialchars($_GET['table']); ?> и <?php echo htmlspecialchars($_GET['count']); ?> записей.
        </div>
    <?php endif; ?>

    <!-- Вывод сообщения об успешной обработке данных -->
    <?php if (isset($_GET["message"])) : ?>
        <div class="alert alert-success mt-3">
            <?= htmlspecialchars($_GET["message"]); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET["source"], $_GET["table"], $_GET["count"])) : ?>
    <div class="alert alert-success mt-3">
        Файл с данными получен из <?= htmlspecialchars($_GET["source"]); ?> и обработан.
        Создана таблица <?= htmlspecialchars($_GET["table"]); ?> и <?= htmlspecialchars($_GET["count"]); ?> записей.
    </div>
    <?php endif; ?>
</div>
</body>
</html>