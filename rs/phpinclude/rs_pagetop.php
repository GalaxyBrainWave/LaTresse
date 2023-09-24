<?php 
  session_name('La_Tresse');  // keep the user
  session_start();            // connected

  if (!isset($_SESSION['user_id'])) { // if no session exists
    header("Location: ../connexion.php"); // redirect to connexion.php
    exit(); // don't linger here
  }
  
  require_once "../Model/Notification.php";
  // here notifications is an int, the number of notifications
  $notifications = Notification::getNumberOfNewNotifications($_SESSION['user_id']);

  if (!isset($_SESSION['actualized']) || time() - $_SESSION['actualized'] > 24*60*60 ) {
    // $_SESSION['actualized'] = time();
    // // Parent process
    // $pid = pcntl_fork();

    // if ($pid === -1) {
    //     // Forking failed. handle
    // } elseif ($pid === 0) {
    //     // Child process

    //     // Close standard input, output, and error streams to detach from the terminal
    //     fclose(STDIN);
    //     fclose(STDOUT);
    //     fclose(STDERR);

    //     // Run the background script
    //     include('update_user_info.php');

    //     // Exit the child process
    //     exit(0);
    // } else {
    //     // Parent process
    //     // The child process ID ($pid) is returned here

    //     // You can continue executing code in the parent process, if needed
    //     echo "Child process started with PID: $pid\n";
    // }
  }
?>
<!-- Standard HTML page top -->
<!DOCTYPE html> 
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">

