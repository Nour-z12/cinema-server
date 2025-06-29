
<?php 

require_once __DIR__ . '/../connection/connection.php';


$users = [
    
    [
        "name" => "rami aziz",
        "email" => "rami@example.com",
        "mobile" => "123456987",
        "password_hash" => "trial123",
        "role" => "admin"
    ]
];

foreach ($users as $user) 
    $hashed_password = password_hash($user['password_hash'], PASSWORD_DEFAULT);

    $name = $conn->real_escape_string($user['name']);
    $email = $conn->real_escape_string($user['email']);
    $mobile = $conn->real_escape_string($user['mobile']);
    $role = $conn->real_escape_string($user['role']);
    $password_hash = $conn->real_escape_string($hashed_password);
    

    $sql = "INSERT INTO users (name, email, mobile, password_hash, role)
            VALUES ('$name', '$email', '$mobile', '$password_hash', '$role')";
    
    if ($conn->query($sql)) {
        echo "User '$name' inserted successfully.<br>";
    } else {
        echo "Error inserting user '$name': " . $conn->error . "<br>";
    }


$conn->close();
