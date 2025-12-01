<?php

$title = $_POST["title"];
$owner = $_POST["owner"];

//Kijken of het bestand bestaat
if (!isset($_FILES["image"])) {
    echo "No file uploaded";
    exit;
}

$file = $_FILES["image"];

//Create uploads folder if needed
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

//Zorg dat de bestandsnaam uniek is
$filename = uniqid() . "_" . basename($file["name"]);
$filepath = $uploadDir . $filename;

// Move file to uploads folder
if (move_uploaded_file($file["tmp_name"], $filepath)) {

    // Save file path in database
    $pdo = new PDO("mysql:host=localhost;dbname=po_webapp;charset=utf8mb4", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $sql = "INSERT INTO afbeeldingen (titel, data, eigenaar)
            VALUES (:titel, :data, :eigenaar)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":titel"    => $title,
        ":data"     => $filepath,   // store file path, not base64
        ":eigenaar" => $owner
    ]);

    echo "Upload success";
} else {
    echo "Error saving file";
}
?>