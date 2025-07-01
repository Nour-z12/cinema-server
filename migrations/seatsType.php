<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS seatTypes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  base_price DECIMAL(10, 2) NOT NULL
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'seatTypes' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}