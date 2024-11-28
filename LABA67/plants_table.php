<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/logic.php');
$result = ProductTable::GetAllGroup();
ProductAction::DeleteGroup();
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

    <div class="add_group">
    <p style="font-size: 25px">Новое Растение</p>
    <a href="add_product.php" class="btn btn-primary btn-sm">Добавить растение</a>
    </div>

    <br>

    <table>
        <thead>
            <tr>
                <th scope="col">Картинка</th>
                <th scope="col">Название</th>
                <th scope="col">Поле</th>
                <th scope="col">Описание</th>
                <th scope="col">Стоимость за тонну</th>
                <th scope="col">Функции</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($result as $item):  ?>
            <tr>
                <td><img src="img/<?= $item['img_path'];?>" class = "foto"></td>
                <td><?=htmlspecialchars($item['name_plant']); ?></td>
                <td><?=htmlspecialchars($item['description_fields']); ?></td>
                <td><?=htmlspecialchars($item['description_plants']); ?></td>
                <td><?=htmlspecialchars($item['price_per_ton']); ?></td>
                <td>
                    <a href="edit_product.php?id=<?= $item['plant_id']; ?>" class="btn btn-success btn-sm">Редактировать</a>
                    <form method="POST" class="d-inline">
                        <button type="submit" value="<?= $item['plant_id']; ?>" name="delete_product" class="btn btn-danger btn-sm">Удалить
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>