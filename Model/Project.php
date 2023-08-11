<?php
    class Project {
        private int $pjId;
        private string $pjTitle;
        private string $pjDescription;
        private DateTime $pjCreationDate;
        private int $creator;
        private int $media;
        private array $categories;

        public function __construct($pjId = 0, $pjTitle = "", $pjDescription = "", $creator = 0, $media = 0) {
            $this->pjId = $pjId;
            $this->pjTitle = $pjTitle;
            $this->pjDescription = $pjDescription;
            $this->pjCreationDate = new DateTime();
            $this->creator = $creator;
            $this->media = $media;
            $this->categories = array();
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
        public function __set($attribute, $value) {
            switch ($attribute) {
                case "pjId":
                    if ($value > 0) {
                        $this->$attribute = $value;
                    } else {
                        $this->$attribute = 0;
                    }
                    break;
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

                $sql = "UPDATE projects SET pj_title = :pj_title, pj_description = :pj_description WHERE pj_id = :pj_id;";

                $query = $pdo->prepare($sql);
                $query->bindParam(":pj_id", $this->pjId, PDO::PARAM_INT);
                $query->bindParam(":pj_title", $this->pjTitle, PDO::PARAM_STR);
                $query->bindParam(":pj_description", $this->pjDescription, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "INSERT INTO projects (pj_title, pj_description) VALUES (:pj_title, :pjdescription);";

                $query = $pdo->prepare($sql);
                $query->bindParam(":pj_title", $this->pjTitle, PDO::PARAM_STR);
                $query->bindParam(":pj_description", $this->pjDescription, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        // Editer un projet
        public function edit() {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "UPDATE projects SET pj_title = :pj_title, pj_description = :pj_description WHERE pj_id = :pj_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":pj_id", $this->pjId, PDO::PARAM_INT);
            $query->bindParam(":pj_title", $this->pjTitle, PDO::PARAM_STR);
            $query->bindParam(":pj_description", $this->pjDescription, PDO::PARAM_STR);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Supprimer un projet
        public function delete(int $pjId) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "DELETE FROM projects WHERE pj_id = :pj_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":pj_id", $this->pjId, PDO::PARAM_INT);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Trouver tous les projets
        public static function findAll() {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM projects ORDER BY pj_id DESC;";

            $query = $pdo->prepare($sql);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        }

        // Trouver les projets par leur id
        public static function findById(int $pjId) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM projects WHERE pj_id = :pj_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":pj_id", $pjId, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        }

        // Trouver tous les projets par leur titre
        public static function findByTitle(string $pjTitle) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM projects WHERE pj_title = :pj_title;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":pj_title", $pjTitle, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE);

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        }
    }