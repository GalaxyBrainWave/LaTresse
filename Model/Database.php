<?php
    class Database {
        private PDO $pdo;

        public function getPdo() {
            return $this->pdo;
        }

        public function setPdo($pdo) {
            $this->pdo = new PDO($pdo);
        }

        public function connect(): PDO {
            require_once "./modules/config.php";

            $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";charset=" . CHARSET . "";
            $this->pdo = new PDO($dsn, DBUSER, DBPASS);

            return $this->pdo;
        }
    }