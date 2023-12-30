<?php 
require_once "../Model/Comment.php";
require_once "../tools/utils.php";

$data = json_decode(file_get_contents("php://input"), true);
$cmId = $data['cmId'];
$action = $data['action'];
if ($action === 'delete') {
  $type = $data['type'];
  if ($type === 'subcomment/commentWithoutChildren') {
    $success = Comment::delete($cmId);
  } else if ($type === 'comment') {
    $success = Comment::nullify($cmId);
  } else {
    $success = false;
  }
} else if ($action === 'update') {
  $updatedCommentText = $data['content'];
  $commentToUpdate = Comment::findById($cmId);
  $commentToUpdate->__set('cmTextContent', $updatedCommentText);
  $commentToUpdate->__set('cmMomentCreation', new DateTime());
  // file_put_contents('log.txt', print_r($commentToUpdate, true) . PHP_EOL, FILE_APPEND);
  $success = $commentToUpdate->save();
  // file_put_contents('log.txt', print_r('success', true) . PHP_EOL, FILE_APPEND);
  // file_put_contents('log.txt', print_r($success, true) . PHP_EOL, FILE_APPEND);
} else {
  $success = false;
}


echo json_encode(['success' => $success]);

?>