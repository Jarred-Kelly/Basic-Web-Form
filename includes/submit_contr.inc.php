<?php

declare(strict_types= 1);

function is_input_empty(string $congregation, string $office, string $first_name, string $last_name) 
{
    if (empty($congregation) || empty($office) || empty($first_name) || empty($last_name)) {
        return true;
    }
    else {
        return false;
    }
}

function create_submission(object $pdo, string $congregation, string $office, string $first_name, string $last_name, int $beef_plates, int $chicken_plates)
{
    set_submission($pdo, $congregation, $office, $first_name, $last_name, $beef_plates, $chicken_plates);
}