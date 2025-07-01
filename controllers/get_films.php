<?php
require_once __DIR__ . '/../connection/connection.php';
require_once __DIR__ . '/../models/film.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["id"])){
    $films = Film::all($conn); 

    $response["Films"] = [];
    foreach($films as $value){
        $response["Films"][] = $value->toArray();
    }
    echo json_encode($response); 
    return;
}else{   $id = $_GET["id"];
    $film = Film::find($conn, $id);
    if($film){
        echo json_encode($film->toArray());
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Film not found"]);
    }
}
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed"]);

}
?>