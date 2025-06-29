<?php    
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "cinema_db";

$conn =new mysqli( $serverName, $username, $password, $dbname);

    if($conn -> connect_error){
        die("connection failed: " . $conn -> connect_error);
    }
    
?>