<?php
//beetje hetzelfde als al die andere php bestanden
//read JSON data
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data["old_name"], $data["new_name"])) {
    die("Invalid input");
}

$old_name = $data["old_name"];
$new_name = $data["new_name"];

try {
    //Maak verbinding met de database
    $pdo = new PDO("mysql:host=localhost;dbname=po_webapp;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("UPDATE afbeeldingen SET titel = :new_name WHERE titel = :old_name");
    $stmt->execute(['new_name' => $new_name, 'old_name' => $old_name]);

    $updateSql = "
        UPDATE pagina
        SET 
            square1_inhoud = CASE WHEN square1_type = 'image' AND square1_inhoud = :old_name THEN :new_name ELSE square1_inhoud END,
            square2_inhoud = CASE WHEN square2_type = 'image' AND square2_inhoud = :old_name THEN :new_name ELSE square2_inhoud END,
            square3_inhoud = CASE WHEN square3_type = 'image' AND square3_inhoud = :old_name THEN :new_name ELSE square3_inhoud END,
            square4_inhoud = CASE WHEN square4_type = 'image' AND square4_inhoud = :old_name THEN :new_name ELSE square4_inhoud END
    ";
    $stmt2 = $pdo->prepare($updateSql);
    $stmt2->execute(['old_name' => $old_name, 'new_name' => $new_name]);

    echo "Update successful";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
