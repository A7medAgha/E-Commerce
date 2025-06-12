<?php
require_once 'confg.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
$result = $conn->query("SHOW DATABASES LIKE 'uni_pro'");
if ($result->num_rows == 0) {
    // Create database if it doesn't exist
    $sql = "CREATE DATABASE uni_pro";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }
}

// Select the database
$conn->select_db('uni_pro');

// Check if users table exists
$result = $conn->query("SHOW TABLES LIKE 'users'");
if ($result->num_rows == 0) {
    // Create users table if it doesn't exist
    $sql = "CREATE TABLE users (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        lastname VARCHAR(255),
        display_name VARCHAR(255),
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY unique_email (email)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
} else {
    // Check if lastname and display_name columns exist
    $result = $conn->query("SHOW COLUMNS FROM users LIKE 'lastname'");
    if ($result->num_rows == 0) {
        $sql = "ALTER TABLE users ADD COLUMN lastname VARCHAR(255) AFTER name";
        if ($conn->query($sql) === TRUE) {
            echo "Column lastname added successfully<br>";
        } else {
            echo "Error adding column lastname: " . $conn->error . "<br>";
        }
    }

    $result = $conn->query("SHOW COLUMNS FROM users LIKE 'display_name'");
    if ($result->num_rows == 0) {
        $sql = "ALTER TABLE users ADD COLUMN display_name VARCHAR(255) AFTER lastname";
        if ($conn->query($sql) === TRUE) {
            echo "Column display_name added successfully<br>";
        } else {
            echo "Error adding column display_name: " . $conn->error . "<br>";
        }
    }
}

$conn->close();
echo "Database check completed. Please try registering again.";
?> 