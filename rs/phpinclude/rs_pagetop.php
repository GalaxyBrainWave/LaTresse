<?php 
  session_name('La_Tresse');  // keep the user
  session_start();            // connected
  // session_destroy();

  if (!isset($_SESSION['user_id'])) { // if no session exists
    header("Location: ../connexion.php"); // redirect to connexion.php
    exit(); // don't linger here
  }
  
  require_once "../Model/Notification.php";
  // here notifications is an int, the number of notifications
  $notifications = Notification::getNumberOfNewNotifications($_SESSION['user_id']);

?>
<!-- Standard HTML page top -->
<!DOCTYPE html> 
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/rs/rsmain.css">
  <?php if (isset($_SESSION['colorMode']) && $_SESSION['colorMode'] === 'night') { ?>
    <link id="color-theme-stylesheet" rel="stylesheet" href="../css/rs/dark_variables.css">
  <?php } else { ?>
    <link id="color-theme-stylesheet" rel="stylesheet" href="../css/rs/variables.css">
    <?php } ?>