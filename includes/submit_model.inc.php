<?php

declare(strict_types= 1);

function set_submission (object $pdo, string $congregation, string $office, string $first_name, string $last_name, int $beef_plates, int $chicken_plates) {
    $query = "INSERT INTO reservations (congregation, office, first_name, last_name, beef_plates, chicken_plates) VALUES 
    (:congregation, :office, :first_name, :last_name, :beef_plates, :chicken_plates);";
    $stsmt = $pdo->prepare($query); 

    $stsmt->bindParam(":congregation", $congregation);
    $stsmt->bindParam(":office", $office);
    $stsmt->bindParam(":first_name", $first_name);
    $stsmt->bindParam(":last_name", $last_name);
    $stsmt->bindParam(":beef_plates", $beef_plates);
    $stsmt->bindParam(":chicken_plates", $chicken_plates);
    
    $stsmt->execute();
}