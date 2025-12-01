<?php
    //Lezen van de ontvangen JSON data
    $data = json_decode(file_get_contents("php://input"), true);

    $pfp = $data["pfp"];
    $username = $data["username"];
    $private = $data["private"];
    $moderator_application = $data["moderator_application"];

    //Bool naar 1 of 0 omzetten, want dat wil SQL om de een of andere reden
    $private = $private ? 1 : 0;
    $moderator_application = $moderator_application ? 1 : 0;

    //Verbinding maken met de database
    $pdo = new PDO("mysql:host=localhost;dbname=po_webapp", "root", "");

    //De dingen updaten
    $stmt = $pdo->prepare("UPDATE account SET pfp = ?, private = ?, moderator_application = ? WHERE naam = ?");
    $stmt->execute([$pfp, $private, $moderator_application, $username]);
?>