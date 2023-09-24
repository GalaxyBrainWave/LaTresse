<?php
  require_once "../tools/utils.php";
  require_once "Database.php";
  require_once "Comment.php";
  require_once "User.php";
				
  class Project {
    private int $pjId;
    private int $pjAuthor;
    private string $pjTitle;
    private string $pjDescription;
    private string $pjCreationDateTime;
    private ?string $pjLocation;
    private ?int $pjBudget;
    private ?string $pjBannerURL;
    private ?string $pjPic1URL;
    private ?string $pjPic2URL;
    private ?string $pjPic3URL;
    private ?string $pjPic4URL;
    // private array $projects;
    // private ?array $categories;

    // public function __construct($pjId = 0, $pjAuthor = 0, $pjTitle = "", $pjDescription = "", $pjCreationDateTime = (new DateTime()), $pjLocation = '', $pjBudget = 0, $pjBannerURL = 'defaultBannerURL (à faire)', $pjPic1URL = '', $pjPic2URL = '', $pjPic3URL = '', $pjPic4URL = '') {
    public function __construct($pjId, $pjAuthor = 0, $pjTitle = '', $pjDescription = '', $pjCreationDateTime = '', $pjLocation = '', $pjBudget = 0, $pjBannerURL = '', $pjPic1URL = '', $pjPic2URL = '', $pjPic3URL = '', $pjPic4URL = '') {
      $this->pjId = $pjId;
      $this->pjAuthor = $pjAuthor;
      $this->pjTitle = $pjTitle;
      $this->pjDescription = $pjDescription;
      $this->pjCreationDateTime = $pjCreationDateTime;
      $this->pjLocation = $pjLocation;
      $this->pjBudget = $pjBudget;
      $this->pjBannerURL = $pjBannerURL;
      $this->pjPic1URL = $pjPic1URL;
      $this->pjPic2URL = $pjPic2URL;
      $this->pjPic3URL = $pjPic3URL;
      $this->pjPic4URL = $pjPic4URL;
    }

    private static $translator = [
      'pj_id' => 'pjId',
      'pj_author' => 'pjAuthor',
      'pj_title' => 'pjTitle',
      'pj_description' => 'pjDescription',
      'pj_location' => 'pjLocation',
      'pj_budget' => 'pjBudget',
      'pj_bannerURL' => 'pjBannerURL',
      'pj_pic1URL' => 'pjPic1URL',
      'pj_pic2URL' => 'pjPic2URL',
      'pj_pic3URL' => 'pjPic3URL',
      'pj_pic4URL' => 'pjPic4URL',
      'pj_creation_date' => 'pjCreationDateTime'
    ];

    // list of the authorized attributes to be altered by the magic accessors
    private static $attributeList = ["pjId", "pjAuthor", "pjTitle", "pjDescription", "pjCreationDateTime", "pjLocation", "pjBudget", "pjBannerURL", "pjPic1URL", "pjPic2URL", "pjPic3URL", "pjPic4URL"];

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













    // public function __get($attribute) {
    //   return $this->$attribute;
    // }
    // public function __set($attribute, $value) {
    //   switch ($attribute) {
    //     case "pjId":
    //       if ($value > 0) {
    //         $this->$attribute = $value;
    //       } else {
    //         $this->$attribute = 0;
    //       }
    //       break;
    //     case "pjCreationDate":
    //       $this->$attribute = new DateTime($value);
    //       break;
    //     case "projects":
    //       $this->$attribute = array($value);
    //       break;
    //     case "categories":
    //       $this->$attribute = array($value);
    //       break;
    //     default:
    //       $this->$attribute = $value;
    //   }
    // }   

    // Méthodes CRUD
    // Enregistrer ou modifier un projet : save = create || update
    public function save() {
      if ($this->pjId > 0) {
        

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
      } else if ($this->pjId === 0) {
        

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

		/**
     * Insert a new row into the database.
     * @param array $values is built on this model: ['dbKey'=>$value]
     * @return array The ID of the inserted row on success, or null on failure.
     */
    public static function insert(array $values) {
			$result = inserter('projects', $values);
			if ($result != null) {
				// here $result should be the target ID
				return [true, $result];
			} else {
				return [false];
			}
		}


		/**
     * Update a row in the database.
     * @param array $values is built on this model: ['dbKey'=>$value]
     * @param int $pjId ID in the target row
     * @return bool true on success, false on failure.
     */
    public static function update(array $values, int $pjId) {
			return updater('projects', $values, 'pj_id', $pjId);
		}


    // Editer un projet
    public function edit() {
      

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
    // public static function findAll() {
      

    //   $db = new Database();
    //   $pdo = $db->connect();

    //   $sql = "SELECT * FROM projects ORDER BY pj_id DESC;";

    //   $query = $pdo->prepare($sql);
    //   $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");

    //   if ($query->execute()) {
    //     $results = $query->fetchAll();
    //     return $results;
    //   }
    // }

    // Trouver les projets par leur id
    public static function findById(int $pjId) {
      $db = new Database();
      $pdo = $db->connect();
      $sql = "SELECT * FROM projects WHERE pj_id = :pj_id;";
      $query = $pdo->prepare($sql);
      $query->bindParam(":pj_id", $pjId, PDO::PARAM_INT);
      // $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      if ($query->execute()) {
        $results = $query->fetchAll();
        $results = $results[0];
        $project = new Project($results['pj_id'], (int)$results['pj_author'], $results['pj_title'], $results['pj_description'], $results['pj_creation_date'], $results['pj_location'], $results['pj_budget'], $results['pj_bannerURL'], $results['pj_pic1URL'], $results['pj_pic2URL'], $results['pj_pic3URL'], $results['pj_pic4URL']);
        return $project;
      } // erreur...
    }


    
    public function getLikes() {
      $db = new Database();
      $pdo = $db->connect();
      $sql = "SELECT 
                COUNT(*) AS total_likes,
                CASE
                  WHEN MAX(pj_reactions.pjr_user_id = :current_user_id) = 1
                  THEN 1
                  ELSE 0
                END AS has_liked 
              FROM pj_reactions 
              WHERE pjr_pj_id = :pj_id;";
      $query = $pdo->prepare($sql);
      $query->bindValue(":pj_id", $this->pjId, PDO::PARAM_INT);
      $query->bindValue(':current_user_id', $_SESSION['user_id'], PDO::PARAM_INT);
      if ($query->execute()) {
        $results = $query->fetchAll();
        // file_put_contents('log.txt', var_export($results, true) . PHP_EOL, FILE_APPEND);
        return $results[0];
      }
    }





    // Trouver tous les projets par leur titre
    public static function findByTitle(string $pjTitle) {
      

      $db = new Database();
      $pdo = $db->connect();

      $sql = "SELECT * FROM projects WHERE pj_title = :pj_title;";

      $query = $pdo->prepare($sql);
      $query->bindParam(":pj_title", $pjTitle, PDO::PARAM_STR);
      $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");

      if ($query->execute()) {
        $results = $query->fetchAll();
        return $results;
      }
    }

    // public static function findByCategory(int $category) {
    //   $db = new Database();
    //   $pdo = $db->connect();
    //   $sql = "SELECT * FROM projects INNER JOIN projects_categories ON pj_id = project INNER JOIN categories ON category = cat_id WHERE cat_id = :cat_id;";
    //   $query = $pdo->prepare($sql);
    //   $query->bindParam(":cat_id", $category, PDO::PARAM_INT);
    //   $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");
    //   if ($query->execute()) {
    //     $results = $query->fetchAll();
    //     return $results;
    //   }
    // }

    // public function loadAllProjects() {
    //   require_once "Project.php";

    //   $this->projects = Project::findById($this->pjId);
    // }




// this method is called when the user clicks on a like button on a project page
  /**
  * @param array $likeData contains: pjId, hasLiked, userId
  * @return bool true if successful
  */
  public static function postLike(array $likeData): bool {
    // file_put_contents('log.txt', var_export($likeData, true) . PHP_EOL, FILE_APPEND);
    $db = new Database();
    $pdo = $db->connect();
    // file_put_contents('log.txt', gettype($likeData['hasLiked']));
    if ($likeData['hasLiked'] === 0) {
      $sql = "INSERT INTO pj_reactions (pjr_user_id, pjr_pj_id) VALUES (:pjr_user_id, :pjr_pj_id);";
    } else if ($likeData['hasLiked'] === 1) {
      $sql = "DELETE FROM pj_reactions WHERE pjr_user_id = :pjr_user_id AND pjr_pj_id = :pjr_pj_id;";
    }
    // file_put_contents('log.txt', $sql);
    $query = $pdo->prepare($sql);
    $query->bindValue(":pjr_user_id", $likeData['userId']);
    $query->bindValue(":pjr_pj_id", $likeData['pjId']);
    return $query->execute();
  }





// this method is called on the landing page to load the last three comments 
  /**
  * @return array|false true if successful
  */
  public static function getLast3() {
    $db = new Database();
    $pdo = $db->connect();
      $sql = "SELECT * FROM projects JOIN users ON projects.pj_author = users.user_id ORDER BY pj_creation_date DESC LIMIT 3;";
    $query = $pdo->prepare($sql);
    if ($query->execute()) {
      $results = $query->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } else {
      return false;
    }
  }



  // this method is called when the timestamp in $_SESSION['actualized'] is older than 24h
  /**
  * @param int $userId
  * @return int|bool number of projects liked by the user or false
  */
  public static function countLikes(int $userId) {
    $sql = "SELECT COUNT(pj_reactions.pjr_pj_id) AS likes FROM pj_reactions WHERE pj_reactions.pjr_user_id = :user_id";
    return userFetcher($sql, $userId);
  }




  // this method is called when the timestamp in $_SESSION['actualized'] is older than 24h
  /**
  * @param int $userId
  * @return int|bool number of projects created by the user or false
  */
  public static function countUserProjects(int $userId) {
    $sql = "SELECT COUNT(projects.pj_id) AS nbProjects FROM projects WHERE projects.pj_author = :user_id";
    return userFetcher($sql, $userId);
  }




  // this method is called one the page listing all projects (rsprojets.php)
  /**
  * @return string|bool stringified json to pass on to a js variable
  */
  public static function findAll() {
    $sql = "
      SELECT projects.*, users.first_name, users.avatar_url
      FROM projects
      JOIN users ON projects.pj_author = users.user_id
      ORDER BY pj_creation_date DESC";
    $projectsList = fetcher($sql);
    foreach($projectsList as &$project) {
      $tempProject = new Project($project['pj_id']);
      $likes = $tempProject->getLikes();
      $project['total_likes'] = $likes['total_likes'];
      $nbComments = Comment::count1stLevelCommentsByProjectId($project['pj_id']);
      $project['nbComments'] = $nbComments['COUNT(cm_id)'];
    }
    unset($project);
    return json_encode($projectsList);
  }


  

  // this method is called one the user's page
  /**
  * @param int $userId
  * @return string|bool stringified json to pass on to a js variable
  */
  public static function findByUser(int $userId) {
    $sql = "
    SELECT projects.*, users.first_name, users.avatar_url
    FROM projects
    JOIN users ON projects.pj_author = users.user_id
    WHERE projects.pj_author = :user_id
    ORDER BY pj_creation_date DESC";
    $projectsList = userFetcher($sql, $userId);
    foreach($projectsList as &$project) {
      $tempProject = new Project($project['pj_id']);
      $likes = $tempProject->getLikes();
      $project['total_likes'] = $likes['total_likes'];
      $nbComments = Comment::count1stLevelCommentsByProjectId($project['pj_id']);
      $project['nbComments'] = $nbComments['COUNT(cm_id)'];
    }
    unset($project);
    return json_encode($projectsList);
  }




  // this method is called when a user posts a project to notify everyone else
  /**
  * @param int $pjId
  * @return bool 
  */
  public static function createNotifications(int $pjId) {
    $sql = "
    SELECT user_id
    FROM users
    ";
    $userIdList = fetcher($sql);
    if($userIdList) {
      foreach($userIdList as $userId) {
        $tempProject = new Project($project['pj_id']);
        $likes = $tempProject->getLikes();
        $project['total_likes'] = $likes['total_likes'];
        $nbComments = Comment::count1stLevelCommentsByProjectId($project['pj_id']);
        $project['nbComments'] = $nbComments['COUNT(cm_id)'];
      }
    }
    return json_encode($projectsList);
  }





  }