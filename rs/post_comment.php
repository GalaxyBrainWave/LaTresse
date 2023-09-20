<?php
  session_name('La_Tresse');
  session_start();
  // // get hold of the user's object
  require_once "../Model/User.php";
  $user = User::getUserDetails($_SESSION['user_id']);
  // to be able to use the sanitize() function
  require_once "../tools/utils.php";
  require_once "../Model/Comment.php";
  $success = false;
  $textContent = '';
  if (!empty($_POST) && isset($_POST['comment_input']) && isset($_POST['pj_id'])) {
    $textContent = sanitize($_POST['comment_input']);
    // if it's a first level comment
    if (!isset($_POST['cm_id'])) {
      $newComment = new Comment($textContent, $_SESSION['user_id'], $_POST['pj_id'], 0, 0, 0);
    } else {
      $newComment = new Comment($textContent, $_SESSION['user_id'], $_POST['pj_id'], 0, 0, $_POST['cm_id']);
    }
    $result = $newComment->insert();
    if ($result != null) {
      $success = true;
      $cmId = $result;
    }
  }

  // Return the data as JSON
  header('Content-Type: application/json');
  echo json_encode(['inserted'=>$success, 'userAvatarPath'=>$user->avatarURL, 'userFirstName'=>$user->firstName, 'textContent'=>$textContent, 'cmId'=>$cmId]);