<?php
  session_name('La_Tresse');
  session_start();
  session_destroy();
  header("Location: ../connexion.php");
  exit();
?>