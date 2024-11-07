<?php
session_start(); // Запускаем сессию

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['email1'])) { // Предполагаем, что email1 используется для идентификации пользователя
    header("Location: registrationBefore.php"); // Перенаправляем на страницу до авторизации
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
    <link href="css/style_table.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Фермерское хозяйство: организация, регистрация и ведение - Темы недели - Журнал - FORUMHOUSE</title>
    <link rel="shortcut icon" href="source/Logo.png" type="image/x-icon">
</head>

<body>
<div class="container1">
<div style="text-align: center;">
    <form action="#form" id="form" method="GET">
        <br>
        <div class="center w-100">Фильтрация результата поиска</div>
        <br>
        <div class="center w-100">По названию:</div>
        <div class="inputs">
            <input type="text" name="name_plant" placeholder="Название" class="form-control w-100"
                  value="<?php echo isset($_GET['name_plant']) ? htmlspecialchars($_GET['name_plant']) : ''; ?>"
                  aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="center w-100">По цене:</div>
        <div class="inputs">
            <select name="order_price" class="form-control w-100" aria-label="Sort by price">
            <option value="" disabled <?php echo empty($_GET['order_price']) ? 'selected' : ''; ?> hidden>Сортировка</option>
                <option value="asc" <?php echo (isset($_GET['order_price']) && $_GET['order_price'] === 'asc') ? 'selected' : ''; ?>>По возрастанию</option>
                <option value="desc" <?php echo (isset($_GET['order_price']) && $_GET['order_price'] === 'desc') ? 'selected' : ''; ?>>По убыванию</option>
            </select>
        </div>
        <div class="center w-100">Фильтрация по полю:</div>
        <div class="inputs">
            <select name="field_id" class="form-control w-100" aria-label="Filter by field">
            <option value="" disabled <?php echo empty($_GET['field_id']) ? 'selected' : ''; ?> hidden>Выберите поле</option>
                <?php foreach($selectA as $items): ?>
                    <option value="<?php echo htmlspecialchars($items['description_fields']); ?>"
                        <?php echo (isset($_GET['field_id']) && $_GET['field_id'] === $items['description_fields']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($items['description_fields']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="container center d-grid gap-2 d-md-block p-2">
            <button type="submit" class="center btn btn-primary">Применить фильтр</button>
            <button type="submit" class="btn btn-danger" name="clearFilter">Сбросить фильтр</button>
        </div>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th scope="col">Картинка</th>
                <th scope="col">Название</th>
                <th scope="col">Поле</th>
                <th scope="col">Описание</th>
                <th scope="col">Стоимость за тонну</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $datas):  ?>
            <tr>
                <td><img src="display_image.php?img=<?= urlencode($datas['img_path']); ?>" class="foto"></td>
                <td><?=$datas['name_plant']; ?></td>
                <td><?=$datas['description_fields']; ?></td>
                <td><?=$datas['description_plants']; ?></td>
                <td><?=$datas['price_per_ton']; ?></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>