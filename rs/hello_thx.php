<?php
  session_name('La_Tresse');
  session_start();

  require_once "../Model/User.php";      
  // to be able to use the sanitize() function
  require_once "../tools/utils.php";
  
  require_once "../Model/Media.php";
  require_once "../Model/Hello_Thanks.php";
  // get hold of the user's object
  $user = User::getUserDetails($_SESSION['user_id']);
  // feed user ID to attributesToSave
  // $attributesToSave["ht_author"] = $_SESSION['user_id'];
  // textContent will hold the value of the textarea if there is one
  $textContent = null;

  // if some data has been received via post
  if (!empty($_POST)) {
    // if the user posted some text
    if (isset($_POST["bjrtxt"])) {      
      $textContent = sanitize($_POST["bjrtxt"]);
    }
  }

  // if some data has been received via files
  if (!empty($_FILES)) {
    // if the user sent an image
    if (isset($_FILES["illustration"])) {
      // make sure no error occured while retrieving the file
      if ($_FILES['illustration']['error'] === UPLOAD_ERR_OK) {
        // grab the file and its info
        $illustration = $_FILES['illustration'];
        // grab the file's original name (from the user's operating system)
        $illustrationOriginalName = $illustration['name'];
        // grab the file's current temporary name 
        $illustrationTmpName = $illustration['tmp_name'];
        // find out what the file extension is
        $fileExtension = pathinfo($illustrationOriginalName, PATHINFO_EXTENSION);
        // we need to check that all the user's entries are ok before moving forward
        // if the file extension is .jpg or .jpeg or .png
        if (!Media::checkImgExtension($fileExtension)) {
          // handle wrong file extension error, go back to the form...
          // à terminer
          // $_SESSION['extensionError'] = "Votre fichier doit avoir l'extension .jpg, .jpeg ou .png";
          // header("Location: rsaccueil.php");
          // exit();

        } 
      } // une erreur s'est produite...
    }

    if (!empty($_POST) || !empty($_FILES)) {
      // create an Hello_Thanks object
      $ht = new Hello_Thanks($_SESSION['user_id'], 0, $textContent, '');
      // // this is the associative array to be eventually fed to the insert() method
      // $valuesToSave = [];
      // if ($textContent != null) {
      //   $valuesToSave['ht_text_content'] = $textContent;
      // }
      $id = $ht->insert();
      // the following line should be conditionned on $id != null
      $id = (int)$id;
      // if the entry into the DB was made successfully, then $result is an int, the id
      if(is_int($id)) {
        if (!empty($_FILES) && isset($_FILES["illustration"]) && $_FILES["illustration"]['tmp_name'] != '') {
          // set the id into the object because update() needs it to be set
          $ht->__set('htId', $id);
          // grab the file and its info
          $illustration = $_FILES['illustration'];
          // grab the file's original name (from the user's operating system)
          $illustrationOriginalName = $illustration['name'];
          // grab the file's current temporary name 
          $illustrationTmpName = $illustration['tmp_name'];
          // find out what the file extension is
          $fileExtension = pathinfo($illustrationOriginalName, PATHINFO_EXTENSION);
          // define the path to the file 
          $illustrationPath = "../img/ht/ht" . $id . "." . $fileExtension;
          if (move_uploaded_file($illustrationTmpName, $illustrationPath)) {
            // if the path is saved in the DB
            if($ht->update(['ht_image_url' => $illustrationPath])) {
              header('Location: rsaccueil.php');
              exit();
            } // erreur... 
          } // une erreur s'est produite... à terminer... 
        } else {
          header('Location: rsaccueil.php');
          exit();
        }
      } // erreur... 
    }
    

  }
