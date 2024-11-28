<?php
class ProductTable{
    public static function GetAllGroup() {
        $host = 'localhost';
        $db = 'plants_db';
        $user = 'root';
        $password = '';
        
        $conn = new mysqli($host, $user, $password, $db);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT DISTINCT pl.plant_id, pl.img_path, pl.name_plant, 
                fl.description_fields, pl.description_plants, pl.price_per_ton
                FROM plants as pl
                LEFT JOIN fields as fl ON pl.field_id = fl.field_number";
    
        $result = $conn->query($sql);
    
        $data = array();
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
    
        $conn->close();
    
        return $data;
    }
    

    public static function GetDirections(){
        $host = 'localhost';
        $db = 'plants_db';
        $user = 'root';
        $password = '';
        
        $conn = new mysqli($host, $user, $password, $db);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM fields";

        $result = $conn->query($sql);

        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $conn->close();

        return $data;
    }
}
class ProductAction {

    public static function GetId($id){
        $host = 'localhost';
        $db = 'plants_db';
        $user = 'root';
        $password = '';
        
        $conn = new mysqli($host, $user, $password, $db);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM plants WHERE plant_id = $id";

        $result = $conn->query($sql);

        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $conn->close();

        return $data;
    }

    public static function CreateGroup() {
        if (isset($_POST['save_product'])) {
            $errors = [];
            $img_path = $_FILES['img_path']['name'] ?? '';
            $name_plant = $_POST['name_plant'] ?? '';
            $field_id = $_POST['field_id'] ?? '';
            $description_plants = $_POST['description_plants'] ?? '';
            $price_per_ton = $_POST['price_per_ton'] ?? '';
    
            if (empty($img_path)) $errors[] = "Поле 'Изображение' не заполнено";
            if (empty($name_plant)) $errors[] = "Поле 'Название растения' не заполнено";
            if (empty($field_id)) $errors[] = "Поле 'Поле' не заполнено";
            if (empty($description_plants)) $errors[] = "Поле 'Описание растения' не заполнено";
            if (empty($price_per_ton)) $errors[] = "Поле 'Цена за тонну' не заполнено";
            if (!is_numeric($price_per_ton)) $errors[] = 'Цена за тонну должна быть числом';
    
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<p style='color: red;'>$error</p>";
                }
                return;
            }
    
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/';
            $tmpImg = $_FILES['img_path']['tmp_name'];
            $uploadFile = $uploadDir . basename($img_path);
    
            if (move_uploaded_file($tmpImg, $uploadFile)) {
                $host = 'localhost';
                $db = 'plants_db';
                $user = 'root';
                $password = '';
                $conn = new mysqli($host, $user, $password, $db);
    
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                $sql = "INSERT INTO plants (img_path, name_plant, field_id, description_plants, price_per_ton) 
                        VALUES ('$img_path', '$name_plant', '$field_id', '$description_plants', '$price_per_ton')";
    
                if ($conn->query($sql) === TRUE) {
                    echo "Новая запись успешно создана!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                $conn->close();
            } else {
                echo "Не удалось загрузить файл.";
            }
        }
    }
    
    

    public static function UpdateGroup() {
        if (isset($_POST['update_product'])) {
            // Retrieve input values
            $id = $_GET['id'];
            $img_path = $_FILES['img_path']['name'];
            $name_plant = $_POST['name_plant'];
            $field_id = $_POST['field_id'];
            $description_plants = $_POST['description_plants'];
            $price_per_ton = $_POST['price_per_ton'];
            
            $errors = [];
    
            if (empty($name_plant)) $errors[] = 'Название растения не заполнено';
            if (empty($field_id)) $errors[] = 'Поле не выбрано';
            if (empty($description_plants)) $errors[] = 'Описание растения не заполнено';
            if (empty($price_per_ton)) $errors[] = 'Цена за тонну не указана';
            if (!is_numeric($price_per_ton)) $errors[] = 'Цена за тонну должна быть числом';
    
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo $error . '<br>';
                }
                return;
            }
    
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/';
            $uploadFile = $uploadDir . basename($img_path);
            
            $conn = new mysqli('localhost', 'root', '', 'plants_db');
            if($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    
            $query = $conn->query("SELECT img_path FROM plants WHERE plant_id = $id");
            $currentImg = $query->fetch_assoc()['img_path'];
    
            if (!empty($img_path) && file_exists($uploadDir . $currentImg)) {
                unlink($uploadDir . $currentImg);
                move_uploaded_file($_FILES['img_path']['tmp_name'], $uploadFile);
            }
    
            $sql = "UPDATE plants SET 
                    name_plant = '$name_plant', 
                    field_id = '$field_id', 
                    description_plants = '$description_plants', 
                    price_per_ton = '$price_per_ton'";
    
            if (!empty($img_path)) {
                $sql .= ", img_path = '$img_path'";
            }
    
            $sql .= " WHERE plant_id = $id";
    
            if ($conn->query($sql) === TRUE) {
                echo "Запись успешно обновлена!";
            } else {
                echo "Ошибка: " . $conn->error;
            }
    
            $conn->close();
        }
    }
    

    public static function DeleteGroup() {
        if (isset($_POST['delete_product'])) {
            $id = $_POST['delete_product'];
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/';

            $host = 'localhost';
            $db = 'plants_db';
            $user = 'root';
            $password = '';
            
    
            $conn = new mysqli($host, $user, $password, $db);
    
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }

            $query = $conn->query("SELECT img_path FROM plants WHERE plant_id = $id");
            $currentImg = $query->fetch_assoc()['img_path'];
           
            if (file_exists($uploadDir . $currentImg)) {
                unlink($uploadDir . $currentImg);
            }

            $sql = "DELETE FROM plants WHERE plant_id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "Запись успешно удалена!";
                header("Location: {$_SERVER['PHP_SELF']}");
            } else {
                echo "Ошибка удаления записи: " . $conn->error;
            }

            $conn->close();
        }
    }
}