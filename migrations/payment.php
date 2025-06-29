<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS paymentMethods (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  payment_method ENUM('card', 'paypal', 'wallet'),
  details TEXT,
  is_default BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'paymentMethods' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}