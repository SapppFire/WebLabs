<?php
include '../connect_to_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $connect->query('SELECT * FROM plants_db.plants');
    $items = $result->fetchAll(PDO::FETCH_ASSOC);

    $filePath = '../files/plants_exported.csv';
    $file = fopen($filePath, 'w');
    
    if ($file && !empty($items)) {
        // Заголовки
        fputcsv($file, array_keys($items[0]));

        // Данные
        foreach ($items as $row) {
            fputcsv($file, $row);
        }
        fclose($file);

        header("Location: ../export_and_import.php?message=Файл с данными сохранен на диск по адресу: $filePath");
    } else {
        echo "Ошибка при экспорте CSV.";
    }
}
?>
