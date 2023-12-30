<?php 
require_once "../Model/Hello_Thanks.php";
require_once "../tools/utils.php";

$data = json_decode(file_get_contents("php://input"), true);
file_put_contents('log.txt', print_r($data, true) . PHP_EOL, FILE_APPEND);
$htId = +$data['htId'];
$action = $data['action'];
if ($action === 'delete') {
  $success = Hello_Thanks::deleteOne($htId);
} else if ($action === 'update') {
  $updatedHtText = $data['content'];
  $success = Hello_Thanks::updateOne($htId, $updatedHtText);
  // file_put_contents('log.txt', print_r($success, true) . PHP_EOL, FILE_APPEND);
} else {
  $success = false;
}
file_put_contents('log.txt', print_r('18', true) . PHP_EOL, FILE_APPEND);


echo json_encode(['success' => $success]);

?>