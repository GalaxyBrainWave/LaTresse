<?php
  class Database {
    // private PDO $pdo;
    public function connect(): PDO {
      // require_once "./modules/config.php";
      require_once "../tools/config.php";
      $pdo = new PDO(DSN, DBUSER, DBPASS);
      return $pdo;
    }
  }
