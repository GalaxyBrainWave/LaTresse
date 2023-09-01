<?php
  session_name('La_Tresse');
  session_start();
  // // get hold of the user's object
  require_once "../Model/User.php";
  $user = User::getUserDetails($_SESSION['user_id']);
  // to be able to use the sanitize() function
  require_once "utils.php";
  require_once "../Model/Comment.php";
  $success = false;
  $textContent = '';
  if (!empty($_POST) && isset($_POST['comment_input']) && isset($_POST['pj_id'])) {
    $textContent = sanitize($_POST['comment_input']);
    $newComment = new Comment($textContent, $_SESSION['user_id'], $_POST['pj_id'], 0, 0, 0);
    if ($newComment->insert()) {
      $success = true;
    }
  }

  // Return the data as JSON
  header('Content-Type: application/json');
  echo json_encode(['inserted'=>$success, 'userAvatarPath'=>$user->avatarURL, 'userFirstName'=>$user->firstName, 'textContent'=>$textContent]);