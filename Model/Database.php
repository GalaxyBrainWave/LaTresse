<?php
    class Database {
        private PDO $pdo;

        public function connect(): PDO {
            require_once "./modules/config.php";

            $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";charset=" . CHARSET . "";
            $pdo = new PDO($dsn, DBUSER, DBPASS);

            return $this->pdo;
        }
    }