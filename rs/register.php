<?php
  session_name('La_Tresse');
  session_start();

  // to make sure that the sanitize() function is available
  require_once "../tools/utils.php";

  // only execute the following code if the form has been filled,  
  // which means the user has submitted the register form
  if (!empty($_POST)) {
    // if all necessary values are set
    if (isset($_POST["register-first-name"]) && isset($_POST["register-email"]) && isset($_POST["register-pwd"]) && isset($_POST["register-pwd2"])) {
      // store the data in local variables
      $firstName = sanitize($_POST['register-first-name']);
      $registerEmail = sanitize($_POST['register-email']);
      require_once "../tools/config.php";
      $registerPwd = $_POST["register-pwd"];
      $registerPwdHash = password_hash($_POST["register-pwd"], PASSWORD_DEFAULT, $hash_options);

      // to be able to check if there already is a user with this email
      require_once "../Model/User.php";
      // to manage error handling
      require_once "register_error.php";
      // password must be at least 6 characters long
      if (strlen($_POST["register-pwd"]) > 5) {
        if (User::checkEmailUnicity($registerEmail)) { // if the email is new in the database
          if ($_POST["register-pwd"] === $_POST["register-pwd2"]) { // if the passwords match
            // create user object
            $newUser = new User(0, $firstName, $registerEmail, $registerPwdHash, false, uniqid());
            // use its save method to enter the data in the database
            if ($newUser->save()) {
              // create the directory to store avatar and banner in img folder
              // I don't know why the following line doesn't work. Chatgpt also doesn't
              // mkdir("../img/users/" . $_SESSION['user_id'], 0777, true); 
              User::login($registerEmail, $registerPwd, true);
            } else { // une erreur est survenue >> à retravailler, la fonction ci-dessous est fictive:
              registrationError($genericErrorMessage, $firstName, $registerEmail);
            }
          } else { // else the passwords don't match
            $errorMessage = 'Les mots de passe ne correspondent pas';
            // empty $_SESSION to avoid any interference in case the user plays with both forms
            session_unset();
            // save the error which will then be displayed automatically upon landing
            $_SESSION['registerError'] = $errorMessage;
            // keep the data entered by the user to display it automatically upon landing
            $_SESSION['registerEmail'] = $_POST['register-email'];
            $_SESSION['registerFirstName'] = $_POST['register-first-name'];
            // go back to the form
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