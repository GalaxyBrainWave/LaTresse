<?php
    class User {
        private int $userId;
        private string $lastName;
        private string $firstName;
        private string $email;
        private string $hashPass;
        private ?int $isAdmin;
        private ?int $nbReactions;
        private ?int $nbHelloThanks;
        private ?int $nbComments;
        private DateTime $accountCreationDate;
        private ?array $projects;
        private ?array $articles;
        private ?array $comments;
        private ?array $helloThanks;
        private ?array $medias;

        public function __construct($userId = 0, $lastName = "", $firstName = "", $email = "", $hashPass = "", $isAdmin = 0, $nbReactions = 0, $nbHelloThanks = 0, $nbComments = 0) {
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
                case "userId":
                    if ($value > 0) {
                        $this->$attribute = $value;
                    } else {
                        $this->$attribute = 0;
                    }
                    break;
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
            try {
                if ($this->userId > 0) {
                    require_once "Database.php";
    
                    $db = new Database();
                    $pdo = $db->connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                    $sql = "UPDATE users SET last_name = :last_name, first_name = :first_name, email = :email, hash_pass = :hash_pass WHERE user_id = :user_id;";
    
                    $pdo = $query->prepare($sql);
                    $query->bindParam(":user_id", $this->userId, PDO::PARAM_INT);
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
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                    $sql = "INSERT INTO users (last_name, first_name, email, hash_pass) VALUES (:last_name, :first_name, :email, :hash_pass);";
    
                    $query = $pdo->prepare($sql);
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
            } catch (PDOException $e) {
                echo "Erreur :" . $e->getMessage();
            }
        }

        // Editer un profil utilisateur
        public function edit() {
            require_once "Database.php";
            
            $db = new Database();
            $pdo = $db->connect();

            $sql = "UPDATE users SET last_name = :last_name, first_name = :first_name, email = :email, hash_pass = :hash_pass WHERE user_id = :user_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":user_id", $this->userId, PDO::PARAM_INT);
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

        // Supprimer un profil utilisateur
        public function delete(int $userId) {
            require_once "Database.php";
                
            $db = new Database();
            $pdo = $db->connect();

            $sql = "DELETE FROM users WHERE id = :id";

            $query = $pdo->prepare($sql);
            $query->bindParam(":user_id", $userId, PDO::PARAM_INT);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Trouver tous les profils utilisateurs
        public static function findAll() {
            require_once "Database.php";
                
            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM users ORDER BY id DESC";

            $query = $pdo->prepare($sql);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        }

        // Trouver les utilisateurs par leur id
        public static function findById(int $userId) {
            require_once "Database.php";
                
            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM users WHERE id = :id;";
            $query = $pdo->prepare($sql);
            $query->bindParam(":id", $userId, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");

            if ($query->execute()) {
                $results = $query->fetch();
                return $results;
            }
        }

        /**
         * Trouver tous les utilisateurs par leur email : 
         * Méthode de connexion via l'application
         * @param string $email Représente l'id de l'utilisateur
         * @return User retrouve l'utilisateur attendu
         */
        public function connectUser(string $email) {

            try {
                require_once "Database.php";
                
                $db = new Database();
                $pdo = $db->connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql = "SELECT * FROM users WHERE email = :email;";
                $query = $pdo->prepare($sql);
                $query->bindParam(":email", $email, PDO::PARAM_STR);
    
                if ($query->execute()) {
                    $results = $query->fetchAll();
                    
                    if (count($results) == 1) {
                        if (password_verify($_POST["hash-login"], $results[0]["hash_pass"])) {
                            session_name("latresse-php");
                            session_start();
    
                            $user = new User($results[0]["user_id"], $results[0]["last_name"], $results[0]["first_name"], $results[0]["email"], $results[0]["hash_pass"], $results[0]["is_admin"]);
    
                            $_SESSION["userid"] = $user->userId;
                            $_SESSION["firstname"] = $user->firstName;
                            $_SESSION["lastname"] = $user->lastName;
                            $_SESSION["email"] = $user->email;
                            $_SESSION["hashpass"] = $user->hashPass;
                            $_SESSION["is_admin"] = $user->isAdmin;
                            $_SESSION["user"] = serialize($user);
                            $_SESSION["auth"] = true;
    
                            header("Location: ./admin-dashboard.php");
                            exit();
                        } else {
                            echo "<script>alert('Les informations saisies sont erronées');</script>";
                        }
                    } else {
                        echo "<script>alert('L\'utilisateur n\'existe pas.');</script>";
                    }
                }
            } catch (PDOException $e) {
                echo "Erreur :" . $e->getMessage();
            }
        }

        public function addNbReactions(int $nbReactions) {

        }

        public function addNbHelloThanks(int $nbHelloThanks) {

        }

        public function addNbComments(int $nbComments) {

        }
    }