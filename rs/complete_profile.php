<?php
  session_name('La_Tresse');
  session_start();
  require_once "../Model/User.php";
  $user = User::getUserDetails($_SESSION['user_id']);
  $attributesToUpdate = User::generateAttributesList();
  require_once "../Model/Media.php";
  if (!empty($_POST)) {
    if (isset($_POST["autodescription"])) {
      require_once "../tools/sanitize.php";
      $attributesToUpdate["autoDescription"] = sanitize($_POST["autodescription"]);
    }

    if (isset($_FILES["avatarinput"])) {
      if ($_FILES['avatarinput']['error'] === UPLOAD_ERR_OK) {
        $avatar = $_FILES['avatarinput'];
        $avatarOriginalName = $avatar['name'];
        $avatarTmpName = $avatar['tmp_name'];
        $fileExtension = pathinfo($avatarOriginalName, PATHINFO_EXTENSION);
        $avatarPath = "../img/users/" . $user->userId . "/avatar." . $fileExtension;
        if (Media::checkImgExtension($fileExtension)) {
          if (move_uploaded_file($avatarTmpName, $avatarPath)) {
            $attributesToUpdate["avatarURL"] = $avatarPath;
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

    if (isset($_FILES["bannerpicinput"])) {
      if ($_FILES['bannerpicinput']['error'] === UPLOAD_ERR_OK) {
        $banner = $_FILES['bannerpicinput'];
        $bannerOriginalName = $banner['name'];
        $bannerTmpName = $banner['tmp_name'];
        $fileExtension = pathinfo($bannerOriginalName, PATHINFO_EXTENSION);
        $bannerPath = "../img/users/" . $user->userId . "/banner." . $fileExtension;
        if (Media::checkImgExtension($fileExtension)) {
          if (move_uploaded_file($bannerTmpName, $bannerPath)) {
            $attributesToUpdate["bannerURL"] = $bannerPath;
          } // une erreur s'est produite... à terminer... 
        } // error: wrong file extension
      } // une erreur s'est produite..
    }
  } // une erreur s'est produite...
  if($user->fineSave($attributesToUpdate)) {
    header("Location: rsaccueil.php");
    exit();
  } // une erreur s'est produite...


