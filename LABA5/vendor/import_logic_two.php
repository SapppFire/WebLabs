<?php

/*
CREATE TABLE IF NOT EXISTS plants_db.plants_imported (
    guid VARCHAR(36) PRIMARY KEY,
    plant_id INT NOT NULL,
    img_path VARCHAR(255),
    name_plant VARCHAR(100),
    field_id INT,
    description_plants TEXT,
    price_per_ton DECIMAL(10,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/


include '../connect_to_db.php';

if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
    $filePath = $_FILES['file']['tmp_name'];
    $fileType = mime_content_type($filePath);
    $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if ($fileType === 'text/csv' && strtolower($fileExtension) === 'csv') {
        $file = fopen($filePath, 'r');
        
        if ($file) {
            $count = 0;
            fgetcsv($file); // Skip header row

            while ($row = fgetcsv($file)) {
                $guid = $row[0];

                // Check if GUID already exists
                $stmt = $connect->prepare("SELECT COUNT(*) FROM plants_db.plants_imported WHERE guid = :guid");
                $stmt->bindParam(':guid', $guid);
                $stmt->execute();
                $exists = $stmt->fetchColumn() > 0;

                if ($exists) {
                    // Update query
                    $query = "UPDATE plants_db.plants_imported 
                              SET plant_id = :id, img_path = :img, name_plant = :name, 
                                  field_id = :field, description_plants = :desc, price_per_ton = :price 
                              WHERE guid = :guid";
                } else {
                    // Insert query
                    $query = "INSERT INTO plants_db.plants_imported 
                              (guid, plant_id, img_path, name_plant, field_id, description_plants, price_per_ton) 
                              VALUES (:guid, :id, :img, :name, :field, :desc, :price)";
                }

                $stmt = $connect->prepare($query);
                $stmt->execute([
                    'guid' => $guid,
                    'id' => intval($row[1]),
                    'img' => $row[2],
                    'name' => $row[3],
                    'field' => intval($row[4]),
                    'desc' => $row[5],
                    'price' => floatval($row[6])
                ]);
                $count++;
            }
            fclose($file);
            header("Location: ../export_and_import.php?message=Файл обработан. Таблица обновлена с $count записями.");
            exit;
        } else {
            header("Location: ../export_and_import.php?error=Ошибка: не удалось открыть CSV файл.");
            exit;
        }
    } else {
        header("Location: ../export_and_import.php?error=Ошибка: файл должен быть в формате CSV.");
        exit;
    }
} else {
    header("Location: ../export_and_import.php?error=Ошибка загрузки файла.");
    exit;
}
?>
