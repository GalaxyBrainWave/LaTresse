<?php 
  session_name('La_Tresse');
  session_start();
  require_once "../Model/User.php";

  $data = json_decode(file_get_contents("php://input"), true);
  $state = $data['state'];
  $user = User::getUserDetails($_SESSION['user_id']);

  if ($state === 'day' || $state === 'night') {
    if ($user->update(['color_mode' => $state])) {
      $_SESSION['colorMode'] = $state;
      http_response_code(200);
    } else {
      http_response_code(500);
    } 
  } else {
    http_response_code(400);
  }

?>