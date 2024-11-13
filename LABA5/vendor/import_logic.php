<?php
include '../connect_to_db.php';

if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $filePath = $_FILES['file']['tmp_name'];
    $fileType = mime_content_type($filePath);  // Determine file type
    $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);  // Get file extension

    if ($fileType === 'text/csv' && strtolower($fileExtension) === 'csv') {
        $file = fopen($filePath, 'r');
        
        if ($file) {
            // Drop and create the table
            $connect->query("DROP TABLE IF EXISTS plants_db.plants_imported");
            $connect->query("CREATE TABLE plants_db.plants_imported(
                plant_id INT NOT NULL,
                img_path VARCHAR(255),
                name_plant VARCHAR(100),
                field_id INT,
                description_plants TEXT,
                price_per_ton DECIMAL(10,2)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            $count = 0;
            fgetcsv($file); // Skip header row

            while ($row = fgetcsv($file)) {
                $stmt = $connect->prepare("INSERT INTO plants_db.plants_imported 
                    VALUES (:id, :img, :name, :field, :desc, :price)");
                $stmt->execute([
                    'id' => intval($row[0]),
                    'img' => $row[1],
                    'name' => $row[2],
                    'field' => intval($row[3]),
                    'desc' => $row[4],
                    'price' => floatval($row[5])
                ]);
                $count++;
            }
            fclose($file);

            // Redirect with success message
            header("Location: ../export_and_import.php?source=Загруженный%20пользователем%20файл&table=plants_imported&count=$count");
            exit;
        } else {
            header("Location: ../export_and_import.php?error=Ошибка при открытии файла.");
            exit;
        }
    } else {
        header("Location: ../export_and_import.php?error=Ошибка: загружаемый файл должен быть в формате CSV.");
        exit;
    }
} else {
    header("Location: ../export_and_import.php?error=Ошибка загрузки файла.");
    exit;
}
