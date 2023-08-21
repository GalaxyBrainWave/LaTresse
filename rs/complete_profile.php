<?php
  session_name('La_Tresse');
  session_start();
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
    if (isset($_POST["autodescription"])) {
      // to be able to use the sanitize() function
      require_once "utils.php";
      // update the associative array
      $attributesToUpdate["autodescription"] = sanitize($_POST["autodescription"]);
    }
  }

  // if some data has been received via files
  if (!empty($_FILES)) {
    // if the user sent an avatar
    if (isset($_FILES["avatarinput"])) {
      // make sure no error occured while retrieving the file
      if ($_FILES['avatarinput']['error'] === UPLOAD_ERR_OK) {
        // grab the file and its info
        $avatar = $_FILES['avatarinput'];
        // grab the file's original name (from the user's operating system)
        $avatarOriginalName = $avatar['name'];
        // grab the file's current temporary name 
        $avatarTmpName = $avatar['tmp_name'];
        // find out what the file extension is
        $fileExtension = pathinfo($avatarOriginalName, PATHINFO_EXTENSION);
        // define the path to the file 
        $avatarPath = "../img/users/" . $user->userId . "/avatar." . $fileExtension;
        // if the file extension is .jpg or .jpeg or .png
        if (Media::checkImgExtension($fileExtension)) {
          // if the file was successfully moved to its destination
          if (move_uploaded_file($avatarTmpName, $avatarPath)) {
            // update the associative array to save the path into the DB later on
            $attributesToUpdate["avatar_url"] = $avatarPath;
          } else { // à terminer... retour sur welcome.php avec le bon affichage etc.
            $_SESSION['movingError'] = 'Une erreur est survenue';
            header("Location: rsprojets.php");
            exit();
          }
        } else { // à terminer
          $_SESSION['extensionError'] = "Votre fichier doit avoir l'extension .jpg, .jpeg ou .png";
          header("Location: rsreseau.php");
          exit();
        }
      } // une erreur s'est produite...
    }

    // if the user sent a banner
    if (isset($_FILES["bannerpicinput"])) {
      // make sure no error occured while retrieving the file
      if ($_FILES['bannerpicinput']['error'] === UPLOAD_ERR_OK) {
        // idem as above (this code should be refactored but I don't have the time to do it now 18/08/2023 22:27)
        $banner = $_FILES['bannerpicinput'];
        $bannerOriginalName = $banner['name'];
        $bannerTmpName = $banner['tmp_name'];
        $fileExtension = pathinfo($bannerOriginalName, PATHINFO_EXTENSION);
        $bannerPath = "../img/users/" . $user->userId . "/banner." . $fileExtension;
        if (Media::checkImgExtension($fileExtension)) {
          if (move_uploaded_file($bannerTmpName, $bannerPath)) {
            $attributesToUpdate["banner_url"] = $bannerPath;
          } // une erreur s'est produite... à terminer... 
        } // error: wrong file extension
      } // une erreur s'est produite..
    }


  }

  if($user->update($attributesToUpdate)) {
    header("Location: rsaccueil.php");
    exit();
  } // une erreur s'est produite...


