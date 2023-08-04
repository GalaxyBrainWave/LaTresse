<?php
    class Project {
        private int $pjId;
        private string $pjTitle;
        private string $pjDescription;
        private DateTime $pjCreationDate;
        private int $creator;
        private int $media;
        private int $user;
        private array $categories;

        public function __construct($pjId, $pjTitle, $pjDescription, $creator, $media, $user) {
            $this->pjId = $pjId;
            $this->pjTitle = $pjTitle;
            $this->pjDescription = $pjDescription;
            $this->pjCreationDate = new DateTime();
            $this->creator = $creator;
            $this->media = $media;
            $this->user = $user;
            $this->categories = array();
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
        public function __set($attribute, $value) {
            switch ($attribute) {
                case "pjCreationDate":
                    $this->$attribute = new DateTime($value);
                    break;
                case "categories":
                    $this->$attribute = array($value);
                    break;
                default:
                    $this->$attribute = $value;
            }
        }     

        // Méthodes CRUD
        // Enregistrer ou modifier un projet : save = create || update
        public function save() {
            if ($this->pjId > 0) {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

            } else {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();
            }
        }

        // Editer un projet
        public function edit() {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();
        }

        // Supprimer un projet
        public function delete(int $pjId) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();
        }

        // Trouver tous les projets
        public function findAll() {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();
        }

        // Trouver les projets par leur id
        public function findById(int $pjId) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();
        }

        // Trouver tous les projets par leur titre
        public function findByTitle(string $pjTitle) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();
        }
    }