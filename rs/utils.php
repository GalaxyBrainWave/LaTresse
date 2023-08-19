<?php
// TDL: create an array listing all 


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

// this function is called in methods fineSave()
// $attributesToUpdate is built on this model: ['dbKey'=>$value] 
// ex: |$attributesToUpdate = [];
//     |...
//     |$attributesToUpdate["banner_url"] = $bannerPath;
// dbKey is the name of the attribute in the DB, and it should be provided from the files that
// handle the html forms' output. Not in the html, we don't want that public
function fineSaver(string $table, array $attributesToUpdate): bool {
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
  $stmt = "UPDATE users SET " . $sqlSET . " WHERE user_id = :user_id;";
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
  $query->bindValue(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);
  if ($query->execute()) {
    return true;
  } else {
    return false;
  }
}
