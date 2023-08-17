<?php 

$genericErrorMessage = "Une erreur est survenue côté serveur. Si cette erreur persiste, veuillez contacter l'administrateur via le <a href='../contact.php'>formulaire de contact</a>";

  function registrationError(string $string, string $firstName, string $registerEmail) {
    $_SESSION['registration_error'] = $string;
    $_SESSION['first_name'] = $firstName;
    $_SESSION['user_email'] = $registerEmail;
    // header('Location: ../connexion.php');
    // exit();
  }