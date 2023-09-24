<?php
  session_name('La_Tresse');
  session_start();
  // file_put_contents('log.txt', var_export($_POST, true) . PHP_EOL, FILE_APPEND);
  // // get hold of the user's object
  require_once "../Model/User.php";
  require_once "../Model/Project.php";
  $user = User::getUserDetails($_SESSION['user_id']);
  // to be able to use the sanitize() function
  require_once "../tools/utils.php";
  require_once "../Model/Comment.php";
  require_once "../Model/Notification.php";
  $success = false;
  $textContent = '';
  if (!empty($_POST) && isset($_POST['comment_input']) && isset($_POST['pj_id'])) {
    $project = Project::findById(+$_POST['pj_id']);
    $textContent = sanitize($_POST['comment_input']);
    // if it's a first level comment
    if (!isset($_POST['cm_id'])) {
      $newComment = new Comment($textContent, +$_SESSION['user_id'], +$_POST['pj_id'], 0, 0, 0);
      $parentAuthor = $project->pjAuthor;
    } else {
      $newComment = new Comment($textContent, +$_SESSION['user_id'], +$_POST['pj_id'], 0, 0, +$_POST['cm_id']);
      $originComment = Comment::findById(+$_POST['cm_id']);
      $parentAuthor = $originComment->cmAuthor;
    }
    $result = $newComment->insert();
    if ($result != null) {
      $success = true;
      $cmId = $result;
    }
  }

  if($success === true) {
    if (!isset($_POST['cm_id'])) {
      $notificationMessage = $user->firstName . ' a commenté votre projet "' . $project->pjTitle . '"';
      $notification = new Notification(0, $notificationMessage, +$_SESSION['user_id'], $parentAuthor, +$_SESSION['pj_id'], null, null, false);
      $notification->save();
    } else {
      $notificationMessage = $user->firstName . ' a répondu à votre commentaire sur le projet "' . $project->pjTitle . '"';
      $notification = new Notification(0, $notificationMessage, +$_SESSION['user_id'], $parentAuthor, +$_POST['pj_id'], null, +$_POST['cm_id'], false);
      file_put_contents('log.txt', var_export($notification, true) . PHP_EOL, FILE_APPEND);
      $notification->save();
    }
  }

  // Return the data as JSON
  header('Content-Type: application/json');
  echo json_encode(['inserted'=>$success, 'userAvatarPath'=>$user->avatarURL, 'userFirstName'=>$user->firstName, 'textContent'=>$textContent, 'cmId'=>$cmId]);