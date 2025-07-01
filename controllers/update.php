<?php 

require_once __DIR__.'/../connection/connection.php';
require_once __DIR__.'/../models/user.php';

header("Access-Control-Allow-Origin: *  "); 
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: Content-Type");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = json_decode(file_get_contents('php://input'), true);


    $userId = (int)$input['id'];
    $new_data = $input['data'];
    

    $user = User::find($conn, $userId);

    if (!$user) {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'User not found with ID: ' . $userId
    ]);
    exit;
}

try {


    if(isset($new_data['password_hash']) && !empty($new_data['password_hash'])) {
        $new_data['password_hash'] = password_hash($new_data['password_hash'], PASSWORD_DEFAULT);
    }

    $success = $user->update($conn, $new_data);
    
    if ($success) {

        $updatedUser_data = User::find($conn, $userId);
        
        echo json_encode([
            'success' => true,
            'message' => 'User updated successfully',
            'user' => $updatedUser_data
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Database update failed'
        ]);
    }
} catch (Error) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Server error'
    ]);
}


}