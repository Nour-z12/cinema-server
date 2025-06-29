<?php 

require_once __DIR__ . '/../connection/connection.php';

$sql = "CREATE TABLE IF NOT EXISTS refreshmentsBookings(
  id INT AUTO_INCREMENT PRIMARY KEY,
  booking_id INT NOT NULL,
  refreshments_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(8, 2) NOT NULL,
  FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
  FOREIGN KEY (refreshment_id) REFERENCES refreshments(id) ON DELETE CASCADE
)";

$execute = $conn->prepare($sql);

if ($execute && $execute->execute()) {
    echo "Table 'booking_snacks' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}