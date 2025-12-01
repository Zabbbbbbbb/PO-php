<?php

//alle variabelen die die moet opslaan voor de paginas
$titelpagina = $_POST["title"];
$owner = $_POST["eigenaar"];
$square1_type   = $_POST["square1_type"];
$square2_type   = $_POST["square2_type"];
$square3_type   = $_POST["square3_type"];
$square4_type   = $_POST["square4_type"];

$square1_inhoud = $_POST["square1_inhoud"];
$square2_inhoud = $_POST["square2_inhoud"];
$square3_inhoud = $_POST["square3_inhoud"];
$square4_inhoud = $_POST["square4_inhoud"];

//verbind met database
$pdo = new PDO("mysql:host=localhost;dbname=po_webapp;charset=utf8mb4", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

//SQL code
$sql = "INSERT INTO pagina (titelpagina, square1_type, square2_type, square3_type, square4_type, square1_inhoud, square2_inhoud, square3_inhoud, square4_inhoud, eigenaar)
        VALUES (:titel, :square1_type, :square2_type, :square3_type, :square4_type, :square1_inhoud, :square2_inhoud, :square3_inhoud, :square4_inhoud, :eigenaar)";

//code klaarmaken om te gebruiken
$stmt = $pdo->prepare($sql);

//uitvoeren van de SQL code
$stmt->execute([
    ":titel"    => $titelpagina,
    ":square1_type" => $square1_type,
    ":square2_type" => $square2_type,
    ":square3_type" => $square3_type,
    ":square4_type" => $square4_type,
    ":square1_inhoud" => $square1_inhoud,
    ":square2_inhoud" => $square2_inhoud,
    ":square3_inhoud" => $square3_inhoud,
    ":square4_inhoud" => $square4_inhoud,
    ":eigenaar" => $owner
]);

//zeg succes (Advies Johan)
echo "Success";

?>