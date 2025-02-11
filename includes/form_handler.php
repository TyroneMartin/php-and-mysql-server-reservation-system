<?php
require_once 'config.php';
require_once 'database.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Sanitize inputs
        $first_name = sanitize_input($_POST['first_name']);
        $last_name = sanitize_input($_POST['last_name']);
        $email = sanitize_input($_POST['email']);
        $phone = sanitize_input($_POST['phone']);
        
        // Begin transaction
        $pdo->beginTransaction();
        
        // Insert customer
        $stmt = $pdo->prepare("INSERT INTO customers (first_name, last_name, email, phone) VALUES (?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $phone]);
        
        $customer_id = $pdo->lastInsertId();
        
        // Insert address
        $stmt = $pdo->prepare("INSERT INTO addresses (customer_id, street_address, city, state, postal_code, country) 
                              VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $customer_id,
            sanitize_input($_POST['street_address']),
            sanitize_input($_POST['city']),
            sanitize_input($_POST['state']),
            sanitize_input($_POST['postal_code']),
            sanitize_input($_POST['country'])
        ]);
        
        // Insert reservation
        $stmt = $pdo->prepare("INSERT INTO reservations (customer_id, check_in_date, check_out_date, 
                              room_type, num_guests, special_requests) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $customer_id,
            $_POST['check_in_date'],
            $_POST['check_out_date'],
            $_POST['room_type'],
            $_POST['num_guests'],
            sanitize_input($_POST['special_requests'])
        ]);
        
        $pdo->commit();
        echo "<div class='alert alert-success'>Reservation submitted successfully!</div>";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>