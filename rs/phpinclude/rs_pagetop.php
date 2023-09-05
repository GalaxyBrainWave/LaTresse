<?php 
  session_name('La_Tresse');
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../connexion.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">

