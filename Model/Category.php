<?php
    class Category {
        private int $catId;
        private string $catName;
        private array $categories;

        public function __construct($catId = 0, $catName = "") {
            $this->catId = $catId;
            $this->catName = $catName;
            $this->categories = array();
        }

        // Accesseurs magiques
        public function __get($attribute) {
            return $this->$attribute;
        }
        public function __set($attribute, $value) {
            switch ($attribute) {
                case "catId":
                    if ($value > 0) {
                        $this->$attribute = $value;
                    } else {
                        $this->$attribute = 0;
                    }
                    break;
                case "categories":
                    $this->$attribute = array($value);
                    break;
                default:
                    $this->$attribute = $value;
            }
        }

        // Méthodes de classe CRUD
        public function save() {
            if ($this->catId > 0) {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "UPDATE categories SET cat_name = :cat_name WHERE cat_id = :cat_id;";

                $query = $pdo->prepare($sql);
                $query->bindParam(":cat_id", $this->catId, PDO::PARAM_INT);
                $query->bindParam(":cat_name", $this->catName, PDO::PARAM_STR);
                
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "INSERT INTO categories (cat_name) VALUES (:cat_name);";
                $query = $pdo->prepare($sql);
                $query->bindParam(":cat_name", $this->catName, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public function edit() {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "UPDATE categories SET cat_name = :cat_name WHERE cat_id = :cat_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":cat_id", $this->catId, PDO::PARAM_INT);
            $query->bindParam(":cat_name", $this->catName, PDO::PARAM_STR);
            
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete(int $catId) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "DELETE FROM categories WHERE cat_id = :cat_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":cat_id", $catId, PDO::PARAM_INT);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public static function findAll() {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM categories ORDER BY cat_id DESC;";

            $query = $pdo->prepare($sql);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Category");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        }

        public static function findById(int $catId) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM categories WHERE cat_id = :cat_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":cat_id", $catId, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Category");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        }

        public static function findByName(string $catName) {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM categories WHERE cat_name = :cat_name;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":cat_name", $catName, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE);

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        }
    }