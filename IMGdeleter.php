<?php

$title = $_POST["title"] ?? '';

if (!$title) {
    echo "No title provided";
    exit;
}

try {
    // Connect to database
    $pdo = new PDO("mysql:host=localhost;dbname=po_webapp;charset=utf8mb4", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // First, get the file path from the database
    $stmt = $pdo->prepare("SELECT data FROM afbeeldingen WHERE titel = :titel");
    $stmt->execute([":titel" => $title]);
    $file = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$file) {
        echo "No image found with that title";
        exit;
    }

    $filepath = $file["data"];

    // Delete file from server
    if (file_exists($filepath)) {
        unlink($filepath);
    }

    // Delete database record
    $stmt = $pdo->prepare("DELETE FROM afbeeldingen WHERE titel = :titel");
    $stmt->execute([":titel" => $title]);

    echo "Image deleted successfully";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
