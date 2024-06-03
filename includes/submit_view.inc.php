<?php

declare(strict_types= 1);

function check_submit_errors() {
    if (isset($_SESSION["errors_submit"])) {
        $errors = $_SESSION["errors_submit"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="invalid-feedback">' . $error .'<p>';
        }

        unset($_SESSION["errors_submit"]);
    } else if (isset($_GET["submit"]) && $_GET["submit"] === "success") {
        echo '<br>';
        echo '<p class = "valid-feedback" >Submission Successful!</p>';
    }
}