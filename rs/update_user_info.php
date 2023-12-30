<?php
  session_name('La_Tresse');  // keep the user
  session_start();            // connected
  // file_put_contents('log.txt', var_export($results, true) . PHP_EOL, FILE_APPEND);
  file_put_contents('log.txt', 'Im here');

  $userId = $_SESSION['user_id'];

  $totalLikes = 0;
  $values = [];

  $htLikes = Hello_Thanks::countLikes($userId);
  $pjLikes = Project::countLikes($userId);
  $cmLikes = Comment::countLikes($userId);

  if($htLikes && $pjLikes && $cmLikes) {
    $htLikes = $htLikes[0]['likes'];
    $totalLikes += $htLikes;
    $pjLikes = $pjLikes[0]['likes'];
    $totalLikes += $pjLikes;
    $cmLikes = $cmLikes[0]['likes'];
    $totalLikes += $cmLikes;
    $values['nb_likes'] = $totalLikes;
  }

  $totalComments = Comment::countUserComments($userId);
  if ($totalComments) {
    $totalComments = $totalComments[0]['likes'];
    $values['nb_comments'] = $totalComments;
  }

  $totalHelloThanks = Hello_Thanks::countUserHTs($userId);
  if ($totalHelloThanks) {
    $totalHelloThanks = $totalHelloThanks[0]['likes'];
    $values['nb_ht'] = $totalHelloThanks;
  }

  $totalProjects = Project::countUserProjects($userId);
  if ($totalProjects) {
    $totalProjects = $totalProjects[0]['likes'];
    $values['nb_projects'] = $totalProjects;
  }

  if(count($values) > 0) {
    $user = new User($userId);
    if(!$user->update($values)) {
      // handle error
    }
  }

