<?php
  class User {
    private int $userId;
    private string $firstName;
    private string $email;
    private string $hashPass;
    private string $colorMode;
    private string $autoDescription;
    private string $avatarURL;
    private string $bannerURL;
    private ?bool $isAdmin;
    private ?int $nbReactions;
    private ?int $nbHelloThanks;
    private ?int $nbComments;
    private DateTime $accountCreationDate;
    // private array $users;
    private ?array $projects;
    // private ?array $articles;
    private ?array $comments;
    private ?array $helloThanks;
    private ?array $medias;


    public function __construct($userId = 0, $firstName = "", $email = "", $hashPass = "", $isAdmin = false, $colorMode = 'day', $autoDescription = '', $avatarURL = '', $bannerURL = '', $nbReactions = 0, $nbHelloThanks = 0, $nbComments = 0) {
      $this->userId = $userId;
      $this->firstName = $firstName;
      $this->email = $email;
      $this->hashPass = $hashPass;
      $this->isAdmin = $isAdmin;
      $this-> colorMode = $colorMode;
      $this-> autoDescription = $autoDescription;
      $this-> avatarURL = $avatarURL;
      $this-> bannerURL = $bannerURL;
      $this->nbReactions = $nbReactions;
      $this->accountCreationDate = new DateTime();
      // $this->users = array();
      $this->projects = array();
      // $this->articles = array();
      $this->comments = array();
      $this->helloThanks = array();
      // medias contains: (?)
      // medias['banner_url']
      // medias['avatar_url']
      // medias['autodescription']
      // medias['location']
      $this->medias = array();
    }

    


    public function populateProperties($assocArray) {
      $this->userId = $assocArray['user_id'];
      $this->firstName = $assocArray['first_name'];
      $this->email = $assocArray['user_email'];
      // $this->hashPass = $assocArray['hash_pass'];
      $this->isAdmin = $assocArray['is_admin'];
      $this-> colorMode = $assocArray['color_mode'];
      $this-> autoDescription = $assocArray['autodescription'];
      $this-> avatarURL = $assocArray['avatar_url'];
      $this-> bannerURL = $assocArray['banner_url'];
      $this->nbReactions = $assocArray['nb_reactions'];
      // $this->accountCreationDate = $assocArray['account_creation_date'];
      // $this->users = array();
      // $this->projects = $assocArray['user_id'];
      // $this->articles = $assocArray['user_id'];
      // $this->comments = $assocArray['user_id'];
      // $this->helloThanks = $assocArray['user_id'];
      // medias contains: (?)
      // medias['banner_url']
      // medias['avatar_url']
      // medias['autodescription']
      // medias['location']
      // $this->medias = $assocArray['user_id'];
    }

    // Accesseur magique
    // public function __get($attribute) {
    //     return $this->$attribute;
    // }

    // public function __set($attribute, $value) {
    //   switch ($attribute) {
    //     case "userId":
    //       if ($value > 0) {
    //           $this->$attribute = $value;
    //       } else {
    //           $this->$attribute = 0;
    //       }
    //       break;
    //     case "accountCreationDate":
    //       $this->$attribute = new DateTime($value);
    //       break;
    //     case "users":
    //       $this->$attribute = array($value);
    //       break;
    //     case "projects":
    //       $this->$attribute = array($value);
    //       break;
    //     case "articles":
    //       $this->$attribute = array($value);
    //       break;
    //     case "comments":
    //       $this->$attribute = array($value);
    //       break;
    //     case "helloThanks":
    //       $this->$attribute = array($value);
    //       break;
    //     case "medias":
    //       $this->$attribute = array($value);
    //       break;
    //     default:
    //       $this->$attribute = $value;
    //   }
    // }

    private static $attributeList = ["userId", "firstName", "email", "hashPass", "colorMode", "autoDescription", "avatarURL", "bannerURL", "nbReactions", "nbHelloThanks", "nbComments", "accountCreationDate", "projects", "comments", "helloThanks", "medias"];

    private static $dbAttributes = [
      "userId" => "user_id",
      "firstName" => "firstName",
      "email" => "user_email",
      "hashPass" => "hash_pass",
      "colorMode" => "color_mode",
      "autoDescription" => "autodescription",
      "avatarURL" => "avatar_url",
      "bannerURL" => "banner_url",
      "nbReactions" => "nb_reactions"
    ];
    
    public function __get(string $attribute) {
      if (in_array($attribute, self::$attributeList)) {
        return $this->$attribute;
      }
    }

    public function __set(string $attribute, $value) {
      if (in_array($attribute, self::$attributeList)) {
        $this->$attribute = $value;
      }
    }

    // this function creates an associative array whose keys are 
    // User's attributes and values are all set to null
    // this array will then be used as input for the save() method
    // after being 
    public static function generateAttributesList() {
      $ouput = array();
      foreach(self::$attributeList as $attribute) {
        $ouput[$attribute] = null;
      }
      return $ouput;
    }

    public function getUsers() {
        return $this->users;
    }
    public function setUsers($users) {
        $this->users = array($users);
    }

    // Méthodes CRUD
    // Inscrire ou modifier un utilisateur : save = create || update
    // public function save() {
    //     try {
    //         if ($this->userId > 0) {
    //             require_once "Database.php";

    //             $db = new Database();
    //             $pdo = $db->connect();
    //             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //             $sql = "UPDATE users SET last_name = :last_name, first_name = :first_name, email = :email, hash_pass = :hash_pass WHERE user_id = :user_id;";

    //             $pdo = $query->prepare($sql);
    //             $query->bindParam(":user_id", $this->userId, PDO::PARAM_INT);
    //             $query->bindParam(":last_name", $this->lastName, PDO::PARAM_STR);
    //             $query->bindParam(":first_name", $this->firstName, PDO::PARAM_STR);
    //             $query->bindParam(":email", $this->email, PDO::PARAM_STR);
    //             $query->bindParam(":hash_pass", $this->hashPass, PDO::PARAM_STR);

    //             if ($query->execute()) {
    //                 return true;
    //             } else {
    //                 return false;
    //             }
    //         } else {
    //             require_once "Database.php";

    //             $db = new Database();
    //             $pdo = $db->connect();
    //             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //             $sql = "INSERT INTO users (last_name, first_name, email, hash_pass) VALUES (:last_name, :first_name, :email, :hash_pass);";

    //             $query = $pdo->prepare($sql);
    //             $query->bindParam(":last_name", $this->lastName, PDO::PARAM_STR);
    //             $query->bindParam(":first_name", $this->firstName, PDO::PARAM_STR);
    //             $query->bindParam(":email", $this->email, PDO::PARAM_STR);
    //             $query->bindParam(":hash_pass", $this->hashPass, PDO::PARAM_STR);

    //             if ($query->execute()) {
    //                 return true;
    //             } else {
    //                 return false;
    //             }
    //         }
    //     } catch (PDOException $e) {
    //         echo "Erreur :" . $e->getMessage();
    //     }
    // }




    /**
    * Inscrire ou modifier un utilisateur : save = create || update
    * @param none
    * @return bool true if the query was executed correctly, false otherwise
    */
    public function save() {
      try {
        if ($this->userId > 0) {
          require_once "Database.php";
          $db = new Database();
          $pdo = $db->connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = "UPDATE users SET first_name = :first_name, user_email = :email, hash_pass = :hash_pass WHERE user_id = :user_id;";

          $pdo = $query->prepare($sql);
          $query->bindParam(":user_id", $this->$myString, PDO::PARAM_INT);
          $query->bindParam(":first_name", $this->firstName, PDO::PARAM_STR);
          $query->bindParam(":email", $this->email, PDO::PARAM_STR);
          $query->bindParam(":hash_pass", $this->hashPass, PDO::PARAM_STR);

          if ($query->execute()) {
            return true;
          } else {
            return false;
          }
        } else if($this->userId === 0) {
          require_once "Database.php";

          $db = new Database();
          $pdo = $db->connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = "INSERT INTO users (first_name, user_email, hash_pass) VALUES (:first_name, :email, :hash_pass);";

          $query = $pdo->prepare($sql);
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





    /**
    * @param $attributesToUpdate is an associative array whose keys are User's attributes and values are all set to null, except for the ones to be updated, which old the value to be inserted in the database for the relevant property
    * @return bool true if the query was executed correctly, false otherwise
    */
    public function fineSave($attributesToUpdate) {
      $attributesShortList = array();
      // this is the part that comes after "SET" in the subsequent sql query:
      $sqlSET = '';
      foreach ($attributesToUpdate as $key=>$value) {
        if ($value != null) {
          // replace the key from the class properties with the key from the database
          $dbKey = self::$dbAttributes[$key];
          $attributesShortList[$dbKey] = $value;
          $sqlSET .= $dbKey . " = :" . $dbKey . ", ";
        }
      }
      // remove the last ", "
      $sqlSET = substr($sqlSET, 0, -2);
      require_once "Database.php";
      $db = new Database();
      $pdo = $db->connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "UPDATE users SET " . $sqlSET . " WHERE user_id = :user_id;";
      $query = $pdo->prepare($sql);
      foreach($attributesShortList as $dbKey=>$value) {
        $dataType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $query->bindValue(":" . $dbKey, $value, $dataType);

      }
      $query->bindValue(":user_id", $this->userId, PDO::PARAM_INT);
      if ($query->execute()) {
        return true;
      } else {
        return false;
      }
    }




















    /**
    * Vérifier que l'adresse email fournie n'existe pas encore dans la BDD
    * @param string $email
    * @return bool true if the email isn't used, false otherwise
    */
    public static function checkEmailUnicity($email) {
      require_once "Database.php";
      $db = new Database();
      $pdo = $db->connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = "SELECT user_email FROM users WHERE user_email = :user_email;";
      $query = $pdo-> prepare($stmt);
      $query-> bindParam(':user_email', $email, PDO::PARAM_STR);
      if ($query-> execute()) {
        $count = $query->fetchColumn();
        switch ($count) {
          case 0:
            return true;
          case 1:
            return false;
          default:
            // handle error report to the admin (see creation of admin interface for this)
            return false;
        }
      } // else error = "une erreur s'est produite. 
      // Si l'erreur persiste, veuillez contacter l'administrateur
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
      $sql = "SELECT * FROM users ORDER BY user_id DESC";
      $query = $pdo->prepare($sql);
      $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
      if ($query->execute()) {
        $results = $query->fetchAll();
        return $results;
      } else {
        return array();
      }
    }

    // Trouver les utilisateurs par leur id
    // public static function findById(int $userId) {
    //     require_once "Database.php";
            
    //     $db = new Database();
    //     $pdo = $db->connect();

    //     $sql = "SELECT * FROM users WHERE user_id = :user_id;";
    //     $query = $pdo->prepare($sql);
    //     $query->bindParam(":user_id", $userId, PDO::PARAM_INT);
    //     $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");

    //     if ($query->execute()) {
    //         $results = $query->fetchAll();
    //         return $results;
    //     } // else afficher message d'erreur
    // }




    public static function getUserDetails(int $userId) {
      require_once "Database.php";
      $db = new Database();
      $pdo = $db->connect();
      $stmt = "SELECT * FROM users WHERE user_id = :user_id;";
      $query = $pdo->prepare($stmt);
      $query->bindParam(":user_id", $userId, PDO::PARAM_INT);
      if ($query->execute()) {
        $results = $query->fetch(PDO::FETCH_ASSOC);
        if ($results) {
          $user = new User();
          $user-> populateProperties($results);
          return $user;
        } // else une erreur s'est produite
      } // else afficher message d'erreur
    }






    // public static function getUserDetails(int $userId) {
    //     require_once "Database.php";
    //     $db = new Database();
    //     $pdo = $db->connect();
    //     $stmt = "SELECT * FROM users WHERE user_id = :user_id;";
    //     $query = $pdo->prepare($stmt);
    //     $query->bindParam(":user_id", $userId, PDO::PARAM_INT);
    //     $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
    // }



    /**
    * Trouver tous les utilisateurs par leur email : 
    * Méthode de connexion via l'application
    * @param string $email Représente l'id de l'utilisateur
    * @return User retrouve l'utilisateur attendu
    */
    // public function connectUser(string $email) {

    //     try {
    //         require_once "Database.php";
            
    //         $db = new Database();
    //         $pdo = $db->connect();
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //         $sql = "SELECT * FROM users WHERE email = :email;";
    //         $query = $pdo->prepare($sql);
    //         $query->bindParam(":email", $email, PDO::PARAM_STR);

    //         if ($query->execute()) {
    //             $results = $query->fetchAll();
                
    //             if (count($results) == 1) {
    //                 if (password_verify($_POST["hash-login"], $results[0]["hash_pass"])) {
    //                     session_name("latresse-php");
    //                     session_start();

    //                     $user = new User($results[0]["user_id"], $results[0]["last_name"], $results[0]["first_name"], $results[0]["email"], $results[0]["hash_pass"], $results[0]["is_admin"]);

    //                     $_SESSION["userid"] = $user->userId;
    //                     $_SESSION["firstname"] = $user->firstName;
    //                     $_SESSION["lastname"] = $user->lastName;
    //                     $_SESSION["email"] = $user->email;
    //                     $_SESSION["hashpass"] = $user->hashPass;
    //                     $_SESSION["admin"] = $user->isAdmin;
    //                     $_SESSION["user"] = serialize($user);
    //                     $_SESSION["auth"] = true;

    //                     header("Location: ./admin-dashboard.php");
    //                     exit();
    //                 } else {
    //                     echo "<script>alert('Les informations saisies sont erronées');</script>";
    //                 }
    //             } else {
    //                 echo "<script>alert('L\'utilisateur n\'existe pas.');</script>";
    //             }
    //         }
    //     } catch (PDOException $e) {
    //         echo "Erreur :" . $e->getMessage();
    //     }
    // }




    /**
   * Méthode de connexion
   * @param string $email Représente l'email de l'utilisateur
   * @param string $hash Représente le hash du mot de passe
   * @param bool $firstLogin Permet de savoir si c'est le premier login de l'utilisateur (auquel cas on le renvoie vers une page de bienvenue qui contient un mini tuto pour l'utilisation de l'appli)
   */
    public static function login(string $email, string $pwd, bool $firstLogin = false) {
      try {
        require_once "Database.php";      
        $db = new Database();
        $pdo = $db->connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT user_id, hash_pass FROM users WHERE user_email = :email;";
        $query = $pdo->prepare($sql);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        if ($query->execute()) {
          $results = $query->fetchAll();        
          if (count($results) === 1) {
            if (password_verify($pwd, $results[0]["hash_pass"])) {
              session_unset();
              $_SESSION['user_id'] = (int) $results[0]["user_id"];
              unset($_SESSION['connectionError'] );
              if ($firstLogin === false) {
                header("Location: rsaccueil.php");
                exit();
              } else if ($firstLogin === true) {
                header("Location: welcome.php");
                exit();
              }
            } else {
              $connectionError = "Mot de passe erroné";
              session_unset();
              $_SESSION['loginError'] = $connectionError;
              $_SESSION['loginEmail'] = $email;
              $_SESSION['display_login_form'] = true;
              header("Location: ../connexion.php");
              exit();
            }
          } else if (count($results) === 0) {
            $connectionError = "Il n'y a pas de compte associé à cette adresse email";
            session_unset();
            $_SESSION['loginError'] = $connectionError;
            $_SESSION['loginEmail'] = $email;
            $_SESSION['display_login_form'] = true;
            header("Location: ../connexion.php");
            exit();
          } else if (count($results) > 1) {
            session_unset();
            $connectionError = "Une erreur est survenue avec votre compte. Veuillez contacter l'administrateur via le <a href='../contact.php'>formulaire de contact</a>.";
            logError($email, "Plusieurs comptes pour la même adresse email"); // function to be coded in order to create a page where all such errors are logged for the admin to take a look at
            $_SESSION['loginError'] = $connectionError;
            header("Location: ../connexion.php");
            exit();
          }
        } // une erreur s'est produite (à coder)
      } catch (PDOException $e) {
        $connectionError = $e->getMessage();
        $_SESSION['loginError'] = $connectionError; // should we display these technical details? A more user-friendly approach may be better
        header("Location: ../connexion.php");
        exit();
      }
    }



          
    public function loadAllUsers() {
      require_once "User.php";
      $this->users = User::findById($this->userId);
    }

    public function addNbReactions(int $nbReactions) {

    }

    public function addNbHelloThanks(int $nbHelloThanks) {

    }

    public function addNbComments(int $nbComments) {

    }
  }