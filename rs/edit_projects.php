<?php 
require_once "../Model/Project.php";
require_once "../tools/utils.php";

$data = json_decode(file_get_contents("php://input"), true);
$pjId = $data['pjId'];
$action = $data['action'];
if ($action === 'delete') {
  $success = Project::delete($pjId);
} 
else if ($action === 'update') {
  $newTitle = $data['newTitle'];
  $newDescription = $data['newDescription'];
  $pjToUpdate = Project::findById($pjId);
  $pjToUpdate->__set('pjTitle', $newTitle);
  $pjToUpdate->__set('pjDescription', $newDescription);
  // $pjToUpdate->__set('pjCreationDateTime', new DateTime());
  // file_put_contents('log.txt', print_r($commentToUpdate, true) . PHP_EOL, FILE_APPEND);
  $success = $pjToUpdate->save();
  // file_put_contents('log.txt', print_r($success, true) . PHP_EOL, FILE_APPEND);
} else {
  $success = false;
}


echo json_encode(['success' => $success]);

?>