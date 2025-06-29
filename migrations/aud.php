<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS auditoriums (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'auditoriums' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}