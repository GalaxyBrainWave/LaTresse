<?php
  session_name('Tresseaux');
  session_start();

  // to make sure that the sanitize() function is available
  require_once "../tools/sanitize.php";

  // only execute the following code if the form has been filled,  
  // which means the user has submitted either the login or the register form
  if (!empty($_POST)) {
    if (isset($_POST["register-first-name"]) && isset($_POST["register-email"]) && isset($_POST["register-pwd"]) && isset($_POST["register-pwd2"])) {
      $firstName = sanitize($_POST['register-first-name']);
      $registerEmail = sanitize($_POST['register-email']);
      require_once "../tools/config.php";
      $registerPwd = $_POST["register-pwd"];
      $registerPwdHash = password_hash($_POST["register-pwd"], PASSWORD_DEFAULT, $hash_options);

      //check if there already is a user with this email
      require_once "../Model/User.php";
      //manage error handling
      require_once "register_error.php";
      if (strlen($_POST["register-pwd"]) > 5) {
        if (User::checkEmailUnicity($registerEmail)) { // if the email is new in the database
          if ($_POST["register-pwd"] === $_POST["register-pwd2"]) { // if the passwords match
            $newUser = new User(0, $firstName, $registerEmail, $registerPwdHash, false);
            if ($newUser->save()) {
              User::login($registerEmail, $registerPwd, true);
            } else { // une erreur est survenue
              registrationError($genericErrorMessage, $firstName, $registerEmail);
            }
          } else { // else the passwords don't match
            $errorMessage = 'Les mots de passe ne correspondent pas';
            session_unset();
            $_SESSION['registerError'] = $errorMessage;
            $_SESSION['registerEmail'] = $_POST['register-email'];
            $_SESSION['registerFirstName'] = $_POST['register-first-name'];
            header("Location: ../connexion.php");
            exit();
          }
        } else { // else there is already a user with this email
          // $emailUnicityError = "Il existe déjà un compte lié à cette adresse email. Si vous avez perdu votre mot de passe, veuillez contacter l'administrateur via le <a href='../contact.php'>formulaire de contact</a>.";
          $emailUnicityError = "Il existe déjà un compte lié à cette adresse email";
          session_unset();
          $_SESSION['registerError'] = $emailUnicityError;
          $_SESSION['registerEmail'] = $_POST['register-email'];
          $_SESSION['registerFirstName'] = $_POST['register-first-name'];
          header("Location: ../connexion.php");
          exit();
        }
      } else { // else pwd trop court
        $errorMessage = 'Le mot de passe est trop court.<br>Utilisez au moins 6 caractères';
        session_unset();
        $_SESSION['registerError'] = $errorMessage;
        $_SESSION['registerEmail'] = $_POST['register-email'];
        $_SESSION['registerFirstName'] = $_POST['register-first-name'];
        header("Location: ../connexion.php");
        exit();
      }
    } else { // une erreur est survenue
      $errorMessage = "Une erreur est survenue côté serveur.<br>Veuillez réessayer. Si cette erreur persiste,<br> veuillez contacter l'administrateur<br> via le <a href='../contact.php'>formulaire de contact</a>";
      session_unset();
      $_SESSION['registerError'] = $errorMessage;
      $_SESSION['registerEmail'] = $_POST['register-email'];
      $_SESSION['registerFirstName'] = $_POST['register-first-name'];
      header("Location: ../connexion.php");
      exit();
    }
  } else { // une erreur est survenue
    $errorMessage = "Une erreur est survenue côté serveur.<br>Veuillez réessayer. Si cette erreur persiste,<br> veuillez contacter l'administrateur<br> via le <a href='../contact.php'>formulaire de contact</a>";
    session_unset();
    $_SESSION['registerError'] = $errorMessage;
    $_SESSION['registerEmail'] = $_POST['register-email'];
    $_SESSION['registerFirstName'] = $_POST['register-first-name'];
    header("Location: ../connexion.php");
    exit();
  }