<?php
  session_name('Tresseaux');
  session_start();
  session_destroy();
  header("Location: ../connexion.php");
  exit();
?>