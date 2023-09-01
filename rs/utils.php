<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../Model/Database.php";
// to be able to use Media::checkImgExtension()
require_once "../Model/Media.php";


// to remove nasty things from strings before insertion into the DB
function sanitize(string $input): string {
  if ($input == null) {
      return "";
  }
  $output = trim($input);
  $output = strip_tags($output);
  // $output = htmlspecialchars($output);
  // characters affected by htmlspecialchars: <, >, ", ', &
  return $output;
}

// this function is called in methods update() it's so far only related to user. to be updated later
// >> attribute $id to be added, containing the particular name of the id in that table
// $attributesToUpdate is built on this model: ['dbKey'=>$value] 
// ex: |$attributesToUpdate = [];
//     |...
//     |$attributesToUpdate["banner_url"] = $bannerPath;
// dbKey is the name of the attribute in the DB, and it should be provided from the files that
// handle the html forms' output. Not in the html, we don't want that public
// $table is the name of the target table
  /**
  * @param string $table is the name of the target table
  * @param array $attributesToUpdate is built on the model $attributesToUpdate['databaseKey'] = $value;
  * @param string $idName is the name of the id in the relevant row of the target table
  * @param int $idValue is the value of the id in the relevant row of the target table
  * @return bool true if the DB entry was executed correctly, false otherwise
  */
function updater(string $table, array $attributesToUpdate, string $idName, int $idValue): bool {
  // this is the part that comes after "SET" in the subsequent sql query:
  $sqlSET = '';
  // iterate over the input array
  foreach ($attributesToUpdate as $dbKey=>$value) {
    // ignore empty strings
    if ($value != '') {
      // expand the SET part of the sql statement as needed
      $sqlSET .= $dbKey . " = :" . $dbKey . ", "; 
    }       
  }
  // remove the last ", "
  $sqlSET = substr($sqlSET, 0, -2);
  // set up the connection to the DB
  require_once "../Model/Database.php";
  $db = new Database();
  $pdo = $db->connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // generate the sql statement
  $stmt = "UPDATE " . $table . " SET " . $sqlSET . " WHERE " . $idName ." = :" . $idName . ";";
  $query = $pdo->prepare($stmt);
  // bind the values as needed, while iterating over the short list
  foreach($attributesToUpdate as $dbKey=>$value) {
    if ($value != '') {
      // there are only two data types: int or string
      $dataType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
      // it is important here to use bindValue as it takes a snapshot of the value of
      // the variable, while with bindParam, the parameter is updated along with the value
      // here the value $value gets updated at each iteration, so with bindParam, all
      // values would be equal to the last value of $value
      $query->bindValue(":" . $dbKey, $value, $dataType);
    }        
  }
  // this is one is on its own, needs to be done no matter what
  $query->bindValue(":" . $idName, $idValue, PDO::PARAM_INT);
  return $query->execute();
}


// this function is called in methods insert()
 // $values is built on the model $values['databaseKey'] = $value;
 // $table is the name of the target table
  /**
  * @param string $table is the name of the target table
  * @param array $values is built on the model $values['databaseKey'] = $value;
  * @return int|null The ID of the inserted row on success, or null on failure
  */
function inserter(string $table, array $values) {
  // this is the comma separated list of properties affected:
  $sqlProperties = '';
  // this is the comma separated list of relevant parameters:
  $sqlParams = '';
  // start building the sql statement with custom content
  foreach($values as $dbKey=>$value) {
    // ignore null values and empty strings
    if ($value != null && $value != '') {
      $sqlProperties .= $dbKey . " ,";
      $sqlParams .= ":" . $dbKey . " ,";
    }
  }
  // remove the last ", "
  $sqlProperties = substr($sqlProperties, 0, -2);
  $sqlParams = substr($sqlParams, 0, -2);
  // set up the connection to the DB
  $db = new Database();
  $pdo = $db->connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // generate the sql statement
  $sql = "INSERT INTO " . $table . " (" . $sqlProperties . ") VALUES (";
  $sql .= $sqlParams . ");";
  $query = $pdo->prepare($sql);
  foreach($values as $dbKey=>$value) {
    if ($value != null && $value != '') {
      // there are only two data types: int or string
      $dataType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
      // it is important here to use bindValue as it takes a snapshot of the value of
      // the variable, while with bindParam, the parameter is updated along with the value
      // here the value $value gets updated at each iteration, so with bindParam, all
      // values would be equal to the last value of $value
      $query->bindValue(":" . $dbKey, $value, $dataType);
    }        
  }
  if ($query->execute()) {
    // $id = $pdo->lastInsertId();
    // $id = (int)$id;
    // die($id);
    return $pdo->lastInsertId();
  } else {
    return null;
  }
}


// this function is called when there is a picture input to handle
  /**
  * @param array $fileInfo is $_FILES["form_name"]
  * @param int $targetID is the id in the target row
  * @param string $pathComponent1 defines the path to the picture
  * @param string $pathComponent2 defines the path to the picture
  * @return array array[0] is true if successful, false otherwise. If true, array[1] holds the path to the picture
  */
function pichandler(array $fileInfo, int $targetID, string $pathComponent1, string $pathComponent2 = '.') {
  // make sure no error occured while retrieving the file
  if ($fileInfo['error'] === UPLOAD_ERR_OK) {
    // grab the file's original name (from the user's operating system)
    $picOriginalName = $fileInfo['name'];
    // find out what the file extension is
    $fileExtension = pathinfo($picOriginalName, PATHINFO_EXTENSION);
    // if the file extension is .jpg or .jpeg or .png
    if (Media::checkImgExtension($fileExtension)) {
      // define the path to the file 
      $picPath = $pathComponent1 . $targetID . $pathComponent2 . $fileExtension;
      // grab the file's current temporary name 
      $picTmpName = $fileInfo['tmp_name'];
      // if the file was successfully moved to its destination
      if (move_uploaded_file($picTmpName, $picPath)) {
        return [true, $picPath];
      } else {
        return [false];
      }
    } // wrong file extension >> ??
  } // une erreur s'est produite...
}






// this function is called when there is a picture input to handle
  /**
  * @param array $likeData contains: cardId, hasLiked, userId
  * @return bool true if successful
  */
function postLike(array $likeData): bool {
  $db = new Database();
  $pdo = $db->connect();
  // file_put_contents('log.txt', gettype($likeData['hasLiked']));
  if ($likeData['hasLiked'] === '0') {
    $sql = "INSERT INTO ht_reactions (htr_user_id, htr_ht_id) VALUES (:htr_user_id, :htr_ht_id);";
  } else if ($likeData['hasLiked'] === '1') {
    $sql = "DELETE FROM ht_reactions WHERE htr_user_id = :htr_user_id AND htr_ht_id = :htr_ht_id;";
  }
  // file_put_contents('log.txt', $sql);
  $query = $pdo->prepare($sql);
  $query->bindValue(":htr_user_id", $likeData['userId']);
  $query->bindValue(":htr_ht_id", $likeData['cardId']);
  return $query->execute();
}