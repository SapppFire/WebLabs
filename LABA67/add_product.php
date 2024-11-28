<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/logic.php');
ProductAction::CreateGroup();
$halls = ProductTable::GetDirections();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_main.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Добавление новой записи</title>
    <link rel="shortcut icon" href="source/Logo.png" type="image/x-icon">
</head>
<body>
<?php require_once 'header.php' ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="add" style="padding: 5px 300px 12px 300px">
                <p style="font-size: 28px">Добавить запись<a href="index.php" class="btn btn-danger float-end" style="position: ">Назад</a></p>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" placeholder="choose your picture" name="img_path" class="form-control">
                    </div>

                    <br>

                    <div class="mb-3">
                        <input type="text" placeholder="Введите название растения" name="name_plant" class="form-control">
                    </div>

                    <br>

                    <div class="mb-3">
                        <select name="field_id" class="form-control">
                            <option value="" selected disabled>Выберите поле</option>
                            <?php
                            foreach ($halls as $items) {
                                ?>
                                <option><?php echo $items['description_fields']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    
                    <br>

                    <div class="mb-3">
                        <input type="text" placeholder="Введите описание растения" name="description_plants" class="form-control">
                    </div>

                    <br>

                    <div class="mb-3">
                        <input type="text" placeholder="Введите цену за тонну" name="price_per_ton" class="form-control">
                    </div>

                    <br>

                    <div class="mb-3">
                        <button type="submit" name="save_product" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>