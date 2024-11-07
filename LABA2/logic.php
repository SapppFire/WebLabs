<?php

$host = 'localhost';
$db = 'plants_db';
$user = 'root';
$password = '';
$charset = 'utf8';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_STRINGIFY_FETCHES => false,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO($dsn, $user, $password, $options);

$sql = "SELECT DISTINCT img_path, name_plant, fields.description_fields, description_plants, price_per_ton 
FROM plants 
INNER JOIN fields ON plants.field_id = fields.field_number";

$arBind = [];
$whereClauses = [];

if (isset($_GET['clearFilter'])) {
    // Очистка значений фильтров
    $_GET['name_plant'] = '';
    $_GET['field_id'] = '';
    $_GET['order_price'] = '';
} else {
    if (count($_GET) > 0) {
        if (!empty($_GET['name_plant'])) {
            $whereClauses[] = "name_plant LIKE :name_Get";
        }
        if (!empty($_GET['field_id'])) {
            $whereClauses[] = "fields.description_fields LIKE :field_id";
        }
    }

    // Добавление WHERE, если есть условия
    if (count($whereClauses) > 0) {
        $sql .= " WHERE " . implode(" AND ", $whereClauses);
    }

    // Обработка сортировки по цене
    if (!empty($_GET['order_price'])) {
        $order = $_GET['order_price'] === 'asc' ? 'ASC' : 'DESC';
        $sql .= " ORDER BY price_per_ton $order";
    }
}

$get_indexes = ['name_Get', 'price_Get', 'descriptionFields_Get'];
$get_columns = ['name_plant', 'price_per_ton', 'description_fields'];
$is_string = [true, false, true];


$stmt = $pdo->prepare($sql);

if (!empty($_GET['name_plant'])) {
    $stmt->bindValue(':name_Get', '%' . $_GET['name_plant'] . '%', PDO::PARAM_STR);
}
if (!empty($_GET['field_id'])) {
    $stmt->bindValue(':field_id', '%' . $_GET['field_id'] . '%', PDO::PARAM_STR);
}

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


$selectA = array();
$query = "SELECT DISTINCT description_fields FROM fields";
$stmt = $pdo->prepare($query);
$stmt->execute();
while ($row = $stmt->fetch()) {
    array_push($selectA, $row);
}