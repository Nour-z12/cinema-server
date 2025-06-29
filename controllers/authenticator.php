<?php

require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/authen.php';

header("Access-Control-Allow-Origin: *  "); 
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);  

    $name = $data['name'];
    $email = $data['email'] ?? null;
    $mobile = $data['mobile'] ?? null;
    $password_hash = $data['password_hash'];


    if(empty($name) || empty($password_hash)) {
        http_response_code(400);
        echo json_encode(["Error 400" => "You need to provide the name and the password_hash"]);
        exit;
    }

    $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);

    $user = new User($conn);
    $result = $user->register_user($name, $email, $mobile, $password_hash);

    if($result) {
        http_response_code(200);
        echo json_encode(["success 200" => "User created successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["Error 500" => "Failed to create user." . $conn->error]);
    }
}