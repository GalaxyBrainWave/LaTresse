<?php
  session_name('La_Tresse');
  session_start();
  // to be able to use the sanitize() function
  require_once "../tools/utils.php";
  require_once "../tools/config.php";
  require_once "../Model/User.php";
  // get hold of the user's object
  $user = User::getUserDetails($_SESSION['user_id']);
  // this is the associative array to be eventually fed to the update() function at the end of this script
  $attributesToUpdate = []; 
  // to be able to use Media::checkImgExtension()
  require_once "../Model/Media.php";
  // if some data has been received via post
  if (!empty($_POST)) {
    // if the user filled their autodescription
    if (isset($_POST['password'])) {
      $password = sanitize($_POST['password']);
      if (password_verify($password, $user->hashPass)) {
        $attributesToUpdate = [];
        if (isset($_POST['newpassword1']) && $_POST['newpassword1'] !== '') {
          if (strlen($_POST['newpassword1']) > 5) {
            if (isset($_POST['newpassword2'])) {
              if ($_POST['newpassword1'] === $_POST['newpassword2']) {
                $attributesToUpdate['hash_pass'] = password_hash($_POST['newpassword1'], PASSWORD_DEFAULT, $hash_options);
              } else {
                $_SESSION['error'] = 'Les mots de passe ne correspondent pas.';
                header('Location: rsupdateprofile.php');
                exit();
              }
            } else {
              $_SESSION['error'] = 'Veuillez confirmer votre mot de passe.';
              header('Location: rsupdateprofile.php');
              exit();
            }
          } else {
            $_SESSION['error'] = 'Mot de passe trop court (6 caractères minimum).';
            header('Location: rsupdateprofile.php');
            exit();
          }
        }
        if (isset($_POST['firstname']) && $_POST['firstname'] !== '') {
          $attributesToUpdate['first_name'] = sanitize($_POST['firstname']);
        }
        if (isset($_POST['self-description']) && $_POST['self-description'] !== '') {
          $attributesToUpdate['autodescription'] = sanitize($_POST['self-description']);
        }
        // take care of new avatar pic if posted
        if (
          !empty($_FILES) && 
          isset($_FILES['avatarinput']) && 
          $_FILES['avatarinput']['error'] === UPLOAD_ERR_OK && 
          $_FILES['avatarinput']['size'] > 0 && 
          $_FILES['avatarinput']['tmp_name'] !== ''
          ) {
          $avatarPath = picUpdater($_FILES['avatarinput'], $user->avatarURL, '../img/users/' . $_SESSION['user_id'] . '/');
          if ($avatarPath) {
            $attributesToUpdate['avatar_url'] = $avatarPath;
          } else {
            $_SESSION['error'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
            header('Location: rsupdateprofile.php');
            exit();
          }
        }
        // take care of new banner pic if posted
        if (!empty($_FILES) && isset($_FILES['bannerpicinput']) && $_FILES['bannerpicinput']['error'] === UPLOAD_ERR_OK && $_FILES['bannerpicinput']['size'] > 0 && $_FILES['bannerpicinput']['tmp_name'] !== '') {
          $bannerPath = picUpdater($_FILES['bannerpicinput'], $user->avatarURL, '../img/users/' . $_SESSION['user_id'] . '/');
          if ($bannerPath) {
            $attributesToUpdate['banner_url'] = $bannerPath;
          } else {
            $_SESSION['error'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
            header('Location: rsupdateprofile.php');
            exit();
          }
        }
        if($user->update($attributesToUpdate)) {
          header("Location: rsprofil.php");
          exit();
        } else {
          $_SESSION['error'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
          header('Location: rsupdateprofile.php');
          exit();
        }
      } else {
        $_SESSION['error'] = 'Mot de passe incorrect';
        header('Location: rsupdateprofile.php');
        exit();
      }
      // update the associative array
    } else {
      $_SESSION['error'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
      header('Location: rsupdateprofile.php');
      exit();
    }
  } else {
    $_SESSION['error'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
    header('Location: rsupdateprofile.php');
    exit();
  }