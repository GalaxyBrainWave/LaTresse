<?php
    class User {
        private int $userId;
        private string $lastName;
        private string $firstName;
        private string $email;
        private string $hashPass;
        private int $isAdmin;
        private ?int $nbReactions;
        private ?int $nbHelloThanks;
        private ?int $nbComments;
        private DateTime $accountCreationDate;
        private array $projects;
        private array $articles;
        private array $comments;
        private array $helloThanks;
        private array $medias;

        public function __construct($userId, $lastName, $firstName, $email, $hashPass, $isAdmin, $nbReactions, $nbHelloThanks, $nbComments) {
            $this->userId = $userId;
            $this->lastName = $lastName;
            $this->firstName = $firstName;
            $this->email = $email;
            $this->hashPass = $hashPass;
            $this->isAdmin = $isAdmin;
            $this->nbReactions = $nbReactions;
            $this->nbHelloThanks = $nbHelloThanks;
            $this->nbComments = $nbComments;
            $this->accountCreationDate = new DateTime();
            $this->projects = array();
            $this->articles = array();
            $this->comments = array();
            $this->helloThanks = array();
            $this->medias = array();
        }

        // Accesseur magique
        public function __get($attribute) {
            return $this->$attribute;
        }

        public function __set($attribute, $value) {
            switch ($attribute) {
                case "accountCreationDate":
                    $this->$attribute = new DateTime($value);
                    break;
                case "projects":
                    $this->$attribute = array($value);
                    break;
                case "articles":
                    $this->$attribute = array($value);
                    break;
                case "comments":
                    $this->$attribute = array($value);
                    break;
                case "helloThanks":
                    $this->$attribute = array($value);
                    break;
                case "medias":
                    $this->$attribute = array($value);
                    break;
                default:
                    $this->$attribute = $value;
            }
        }

        // Méthodes CRUD
        // Inscrire ou modifier un utilisateur : save = create || update
        public function save() {
            if ($this->userId > 0) {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "UPDATE users SET last_name = :last_name, first_name = :first_name, email = :email, hash_pass = :hash_pass WHERE user_id = :user_id;";

                $pdo = $query->prepare($sql);
                $query->bindParam(":user_id", $this->userId, PDO::PARAM_STR);
                $query->bindParam(":last_name", $this->lastName, PDO::PARAM_STR);
                $query->bindParam(":first_name", $this->firstName, PDO::PARAM_STR);
                $query->bindParam(":email", $this->email, PDO::PARAM_STR);
                $query->bindParam(":hash_pass", $this->hashPass, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "INSERT INTO users (last_name, first_name, email, hash_pass) VALUES (:last_name, :first_name, :email, :hash_pass);";

                $pdo = $query->prepare($sql);
                $query->bindParam(":last_name", $this->lastName, PDO::PARAM_STR);
                $query->bindParam(":first_name", $this->firstName, PDO::PARAM_STR);
                $query->bindParam(":email", $this->email, PDO::PARAM_STR);
                $query->bindParam(":hash_pass", $this->hashPass, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        // Editer un profil utilisateur
        public function edit() {
            require_once "Database.php";
            
            $db = new Database();
            $pdo = $db->connect();

            $sql = "UPDATE users SET last_name = :last_name, first_name = :first_name, email = :email, hash_pass = :hash_pass WHERE user_id = :user_id;";
            $pdo = $query->prepare($sql);
        }

        // Supprimer un profil utilisateur
        public function delete(int $userId) {
            require_once "Database.php";
                
            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM users ORDER BY id DESC";
        }


        public function findAll() {
            require_once "Database.php";
                
            $db = new Database();
            $pdo = $db->connect();
        }

        public function findById(int $userId) {
            require_once "Database.php";
                
            $db = new Database();
            $pdo = $db->connect();
        }

        public function findByEmail(string $email) {
            require_once "Database.php";
                
            $db = new Database();
            $pdo = $db->connect();
        }
    }