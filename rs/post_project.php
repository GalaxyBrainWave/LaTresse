<?php
  session_name('La_Tresse');
  session_start();
  // // get hold of the user's object
  require_once "../Model/User.php";
  $user = User::getUserDetails($_SESSION['user_id']);
  // to be able to use Media::checkImgExtension()
  require_once "../Model/Media.php";
  // to be able to use the sanitize() function
  require_once "../tools/utils.php";
  require_once "../Model/Project.php";

  // if some data has been received via post
  if (!empty($_POST)) {
    // if the user filled the description of their project (as of 23/08/22 the only required field)
    if (isset($_POST["description"])) {
      $values = [];
      $values['pj_description'] = sanitize($_POST["description"]);
      // if the user filled the category
      if (isset($_POST["category"])) {
        $values['pj_category'] = sanitize($_POST["category"]);
      }
      // if the user filled the location
      if (isset($_POST["location"])) {
        $values['pj_location'] = sanitize($_POST["location"]);
      }
      // if the user filled the title
      if (isset($_POST["title"])) {
        $values['pj_title'] = sanitize($_POST["title"]);
      }
      // if the user filled the budget
      if (isset($_POST["budget"])) {
        $values['pj_budget'] = sanitize($_POST["budget"]);
      }
      $values['pj_author'] = $_SESSION['user_id'];
      $result = Project::insert($values);
      if ($result[0]) {
        $pjId = (int)$result[1];
        // if some data has been received via files
        if (($_FILES["project-banner-picinput"]['size'] > 0 || $_FILES["project-picinput1"]['size'] > 0 || $_FILES["project-picinput2"]['size'] > 0 || $_FILES["project-picinput3"]['size'] > 0 || $_FILES["project-picinput4"]['size'] > 0)) {
          // if the user sent a banner
          if ($_FILES["project-banner-picinput"]['size'] > 0) {
            // file_put_contents('log.txt', var_export($_FILES["project-banner-picinput"], true) . PHP_EOL, FILE_APPEND);
            $banner = pichandler($_FILES["project-banner-picinput"], $pjId, '../img/projects/pj', '_banner.');
            // if the picture was successfully stored
            if ($banner[0]) {
              // get the picture's file path
              $picvalues['pj_bannerURL'] = $banner[1];
            }
          }
          // if the user sent pic#1
          if (isset($_FILES["project-picinput1"]) && $_FILES['project-picinput1']['error'] === UPLOAD_ERR_OK) {
            $picinput1 = pichandler($_FILES["project-picinput1"], $pjId, '../img/projects/pj', '_pic1.');
            // if the picture was successfully stored
            if ($picinput1[0]) {
              // get the picture's file path
              $picvalues['pj_pic1URL'] = $picinput1[1];
            }
          }
          // if the user sent pic#2
          if (isset($_FILES["project-picinput2"]) && $_FILES['project-picinput2']['error'] === UPLOAD_ERR_OK) {
            $picinput2 = pichandler($_FILES["project-picinput2"], $pjId, '../img/projects/pj', '_pic2.');
            // if the picture was successfully stored
            if ($picinput2[0]) {
              // get the picture's file path
              $picvalues['pj_pic2URL'] = $picinput2[1];
            }
          }
          // if the user sent pic#3
          if (isset($_FILES["project-picinput3"]) && $_FILES['project-picinput3']['error'] === UPLOAD_ERR_OK) {
            $picinput3 = pichandler($_FILES["project-picinput3"], $pjId, '../img/projects/pj', '_pic3.');
            // if the picture was successfully stored
            if ($picinput3[0]) {
              // get the picture's file path
              $picvalues['pj_pic3URL'] = $picinput3[1];
            }
          }
          // if the user sent pic#4
          if (isset($_FILES["project-picinput4"]) && $_FILES['project-picinput4']['error'] === UPLOAD_ERR_OK) {
            $picinput4 = pichandler($_FILES["project-picinput4"], $pjId, '../img/projects/pj', '_pic4.');
            // if the picture was successfully stored
            if ($picinput4[0]) {
              // get the picture's file path
              $picvalues['pj_pic4URL'] = $picinput4[1];
            }
          }
          if (Project::update($picvalues, $pjId)) {
            // Project::createNotifications($pjId, $_SESSION['user_id']);
            header('Location: rspageprojet.php?id=' . $pjId);
            exit();
          } // error ...
          } else { // if the user didn't upload any picture
            header('Location: rspageprojet.php?id=' . $pjId);
            exit();
          }
        } 
        else {
          $_SESSION['processError'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
          header('Location: rscreerprojet.php');
          exit();
        }
    }
    else {
      $_SESSION['processError'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
      header('Location: rscreerprojet.php');
      exit();
    }
  } 
  else {
    $_SESSION['processError'] = 'Une erreur est survenue côté serveur. Veuillez réessayer.';
    header('Location: rscreerprojet.php');
    exit();
  }
  
