<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["data1"]) && ($_POST["data2"]) && isset($_POST["data3"]) && isset($_POST["data4"]) && isset($_POST["data5"]) && isset($_POST["data6"])) {
        require_once 'databaseconnection.php';
        if ($conn->connect_error) {
            die("connection failed to database: " . $conn->connect_error);
        }
        $sql = "INSERT INTO d (data1, data2, data3, data4, data5, data6) VALUES (?,?,?,?,?,?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("isssii", $data1, $data2, $data3, $data4, $data5, $data6);
            $data1 = $_POST["data1"];
            $data2 = $_POST["data2"];
            $data3 = $_POST["data3"];
            $data4 = $_POST["data4"];
            $data5 = $_POST["data5"];
            $data6 = $_POST["data6"];
            if ($stmt->execute()) {
                http_response_code(201);
                echo "Sikeresen lett hozzáadva";
            } else {
                http_response_code(404);
                echo 'Sikertelen hozzáadás';
            }
            $stmt->close();
        } else {
            echo "Hiba a lekérés előkészítésekor: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "Hiányzó mezők!";
    }
} else {
    echo "Érvénytelen kérés!";
}