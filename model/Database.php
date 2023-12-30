<?php
  class Database {
    public function connect(): PDO {
      require_once "../tools/config.php";
      $pdo = new PDO(DSN, DBUSER, DBPASS);
      return $pdo;
    }
  }
?>


