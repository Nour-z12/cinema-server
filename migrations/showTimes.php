<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS showTimes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  films_id INT NOT NULL,
  auditorium_id INT NOT NULL,
  show_date DATE NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  FOREIGN KEY (movie_id) REFERENCES Films(id) ON DELETE CASCADE,
  FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id) ON DELETE CASCADE
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'showTimes' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}