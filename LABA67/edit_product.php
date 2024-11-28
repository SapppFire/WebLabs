<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/logic.php');
$id = $_GET['id'] ?? null;
$product = ProductAction::GetId($id)[0];
$halls = ProductTable::GetDirections();
ProductAction::UpdateGroup();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_main.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Редактирование записи</title>
    <link rel="shortcut icon" href="source/Logo.png" type="image/x-icon">
</head>
<body>
<?php require_once 'header.php' ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="update" style="padding: 5px 300px 12px 300px">
                <div class="card-header">
                    <p style="font-size: 28px">Обновить запись<a href="index.php" class="btn btn-danger float-end" style="position: ">Назад</a></p>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" placeholder="Enter name" name="img_path"
                                   value="<?= htmlspecialchars($product ['img_path']) ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Название</label>
                            <input type="text" name="name_plant" value="<?=  htmlspecialchars($product ['name_plant']) ?>"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Поле</label>
                            <select name="field_id" class="form-control">
                                <?php
                                foreach ($halls as $items) 
                                {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($items['field_id']); ?>"<?php if ($product['field_id'] == $items['field_id']) 
                                    echo 'selected'; ?>><?php echo $items['description_fields']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Описание</label>
                            <input type="text" name="description_plants" value="<?= htmlspecialchars($product ['description_plants']) ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Стоимость за тонну</label>
                            <input type="text" name="price_per_ton" value="<?= htmlspecialchars($product ['price_per_ton']) ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="update_product" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>