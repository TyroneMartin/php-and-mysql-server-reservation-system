<?php
require_once 'config.php';

class Database {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Initialize the database
    public function initializeDatabase() {
        try {
            // Create database if it doesn't exist
            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS " . $_ENV['DB_NAME']);
            $this->pdo->exec("USE " . $_ENV['DB_NAME']);
            
            // Create customers table
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS customers (
                customer_id INT PRIMARY KEY AUTO_INCREMENT,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                email VARCHAR(100) UNIQUE NOT NULL,
                phone VARCHAR(20),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            // Create addresses table
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS addresses (
                address_id INT PRIMARY KEY AUTO_INCREMENT,
                customer_id INT,
                street_address VARCHAR(100) NOT NULL,
                city VARCHAR(50) NOT NULL,
                state VARCHAR(50),
                postal_code VARCHAR(20),
                country VARCHAR(50) NOT NULL,
                FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
            )");

            // Create reservations table
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS reservations (
                reservation_id INT PRIMARY KEY AUTO_INCREMENT,
                customer_id INT,
                check_in_date DATE NOT NULL,
                check_out_date DATE NOT NULL,
                room_type VARCHAR(50) NOT NULL,
                num_guests INT NOT NULL,
                special_requests TEXT,
                status VARCHAR(20) DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
            )");

            return true;
        } catch (PDOException $e) {
            error_log("Database initialization error: " . $e->getMessage());
            return false;
        }
    }
}

// Initialize the database
$database = new Database($pdo);
$database->initializeDatabase();
?>