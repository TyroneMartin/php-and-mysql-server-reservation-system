<?php
// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate date format
// function validate_date($date) {
//     $d = DateTime::createFromFormat('Y-m-d', $date);
//     return $d && $d->format('Y-m-d') === $date;
// }

function validate_dates($check_in, $check_out) {
    $check_in_obj = DateTime::createFromFormat('Y-m-d', $check_in);
    $check_out_obj = DateTime::createFromFormat('Y-m-d', $check_out);
    $today = new DateTime();
    
    return $check_in_obj && $check_out_obj && 
           $check_in_obj > $today && 
           $check_out_obj > $check_in_obj;
}

function validate_guests($num) {
    return filter_var($num, FILTER_VALIDATE_INT, 
                     array("options" => array("min_range"=>1, "max_range"=>10)));
}

// Function to validate email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone number
function validate_phone($phone) {
    return preg_match('/^[0-9]{10}$/', $phone);
}
?>