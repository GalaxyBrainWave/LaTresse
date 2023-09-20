<?php
  require_once "../Model/User.php";

  $userList = User::getAll();
  if ($userList != false) {
    $response = json_encode($userList);
  } else $response = false;

  // Return the data as JSON
  header('Content-Type: application/json');
  echo $response;
?>