<?php
    // Read JSON data
    $data = json_decode(file_get_contents("php://input"), true);

    $pfp = $data["pfp"];
    $username = $data["username"];
    $private = $data["private"];
    $moderator_application = $data["moderator_application"];

    // Convert JS boolean to integer for MySQL
    $private = $private ? 1 : 0;
    $moderator_application = $moderator_application ? 1 : 0;

    // Connect to database
    $pdo = new PDO("mysql:host=localhost;dbname=po_webapp", "root", "");

    // Update both fields
    $stmt = $pdo->prepare("UPDATE account SET pfp = ?, private = ?, moderator_application = ? WHERE naam = ?");
    $stmt->execute([$pfp, $private, $moderator_application, $username]);
?>