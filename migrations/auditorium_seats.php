<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS auditoriumSeats (
  id INT AUTO_INCREMENT PRIMARY KEY,
  auditorium_id INT NOT NULL,
  seat_number VARCHAR(10) NOT NULL,
  seat_type_id INT NOT NULL,
  row_label VARCHAR(10),
  FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id) ON DELETE CASCADE,
  FOREIGN KEY (seat_type_id) REFERENCES seatTypes(id) ON DELETE SET NULL
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'auditoriumSeats' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}