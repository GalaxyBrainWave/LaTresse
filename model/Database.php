<?php

  // nouvelle classe Database
  class Database {
    public PDO $pdo;

    public function connect(): PDO {
      require_once "./modules/config.php";
      $pdo = new PDO($dsn, DBUSER, DBPASS);
      return $this->pdo;
    }
  }
