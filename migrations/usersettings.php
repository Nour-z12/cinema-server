<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql=
"CREATE TABLE IF NOT EXISTS userSettings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  favorite_genres TEXT,
  favorite_contact_title ENUM('email', 'phone') DEFAULT 'email',
  auto_subscription BOOLEAN DEFAULT FALSE, 
  FOREIGN KEY (user_id) REFERENCES users(id)
);";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'user_preferences' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}