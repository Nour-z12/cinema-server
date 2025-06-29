<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS Films (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  trailer_url VARCHAR(255),
  cast TEXT,
  rating VARCHAR(10),
  genre VARCHAR(100),
  release_date DATE,
  duration_minutes INT
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'Films' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}