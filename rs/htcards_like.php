<?php
require_once "../rs/utils.php";
// php://input is a  a way to access POST data when encoded in JSON
// true means the JSON string will be decoded into an associative array, not an object
$likeData = json_decode(file_get_contents("php://input"), true);
// file_put_contents('log.txt', json_encode($likeData, JSON_PRETTY_PRINT));
if (postLike($likeData)) {
  $response = ['success'=>true];
} else {
  $response = ['success'=>false];
}

// Send a JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>

















<?php
// // Get the data sent from JavaScript
// $data = json_decode(file_get_contents("php://input"), true);

// // Process the data
// $responseData = array('message' => 'Data received successfully', 'data' => $data);

// // Send a JSON response
// header('Content-Type: application/json');
// echo json_encode($responseData);
?>
