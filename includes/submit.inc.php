<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $congregation = $_POST["congregation"];
    $office = $_POST["office"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $beef_plates = isset($_POST["beef_plates"]) && $_POST["beef_plates"] !== '' ? $_POST["beef_plates"] : '0';
    $chicken_plates = isset($_POST["chicken_plates"]) && $_POST["chicken_plates"] !== '' ? $_POST["chicken_plates"] : '0';

   
    try {

        require_once "dbh.inc.php";
        require_once "submit_model.inc.php";
        require_once "submit_contr.inc.php";

        // Error Handlers
        $errors = [];

        if (is_input_empty($congregation, $office, $first_name, $last_name)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        require_once "config_session.inc.php";

        create_submission($pdo, $congregation, $office, $first_name, $last_name, $beef_plates, $chicken_plates);

        header("Location: ../success.html");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        header("Location: ../failed.html");
        die();
    }

} else {
    header("Location: ../index.html");
    die();
}
