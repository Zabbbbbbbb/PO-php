<?php

$title = $_POST["title"] ?? '';

if (!$title) {
    echo "No title provided";
    exit;
}

try {
    //Verbind met de database
    $pdo = new PDO("mysql:host=localhost;dbname=po_webapp;charset=utf8mb4", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    //Krijg pad naam via database en sla hem op als $file
    $stmt = $pdo->prepare("SELECT data FROM afbeeldingen WHERE titel = :titel");
    $stmt->execute([":titel" => $title]);
    $file = $stmt->fetch(PDO::FETCH_ASSOC);

    //check of ie uberhaupt bestaat, en anders stoppen
    if (!$file) {
        echo "No image found with that title";
        exit;
    }

    //als hij dus bestaat, sla hem op als $filepath
    $filepath = $file["data"];

    //Verwijder het bestand
    if (file_exists($filepath)) {
        unlink($filepath);
    }

    //Verwijder bewijs dat hij ooit heeft bestaan
    $stmt = $pdo->prepare("DELETE FROM afbeeldingen WHERE titel = :titel");
    $stmt->execute([":titel" => $title]);

    echo "Image deleted successfully";

} catch (PDOException $e) {
    //als er een fout is dan pakt hij die en geeft t door
    echo "Error: " . $e->getMessage();
}
