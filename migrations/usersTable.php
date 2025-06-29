<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE,
    mobile VARCHAR(20) UNIQUE,
    password_hash VARCHAR(255),
    verified_age BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     CONSTRAINT chk_contact_method CHECK (
    (email IS NOT NULL OR mobile IS NOT NULL)
    OR
    (social_provider IS NOT NULL AND social_id IS NOT NULL)
  )
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'users' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}