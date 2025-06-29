<?php

require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/authen.php';

header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'] ?? null;
    $mobile = $data['mobile'] ?? null;
    $password_hash = $data['password_hash'];

    $user = new User($conn);

    $user_data = $user->Login_user($email, $mobile);

    if ($user_data && $user_data->num_rows > 0) {
        $user_data = $user_data->fetch_assoc();

        if(password_verify($password_hash, $user_data['password_hash'])){
            http_response_code(200);
            echo json_encode([
                "user_data" => [
                    "id" => $user_data['id'],
                    "name" => $user_data['name']
                ]
            ]);
            exit;
        } else {
            http_response_code(401);
            echo json_encode([
                "Error" => "Password  is incorrect"
            ]);
            exit;
        } 
    }else {
        http_response_code(404);
        echo json_encode([
            "Error" => "User Not found"
            ]);
    }
}