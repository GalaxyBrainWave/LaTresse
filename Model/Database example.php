<?php

    // nouvelle classe Database
    class Database {
        private PDO $pdo;

        public function connect(): PDO {
            require_once "./modules/config.php";

            $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";charset=" . CHARSET . "";
            $pdo = new PDO($dsn, DBUSER, DBPASS);

            return $this->pdo;
        }
    }

    // config.php

    const HOST = "localhost";
    const PORT = "3306";
    const DBNAME = "la_tresse";
    const CHARSET = "utf8";

    const DBUSER = "root";
    const DBPASS = "";

    $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";charset=" . CHARSET . "";
    $pdo = new PDO($dsn, DBUSER, DBPASS);

    
    // appel dans chaque méthode
    require_once "Database.php";

    $db = new Database();
    $pdo = $db->connect();