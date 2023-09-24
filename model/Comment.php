<?php 
  require_once "Database.php";
  require_once "../tools/utils.php";

  class Comment {

    private int $cmId;
    private string $cmTextContent;
    private DateTime $cmMomentCreation;
    private int $cmAuthor;
    private ?int $projectId;
    private ?int $cmParentId;



    public function __construct($cmTextContent, $cmAuthor, $projectId = 0, $cmId = 0, $cmParentId = 0)
    {
      $this->cmId = $cmId;
      $this->cmTextContent = $cmTextContent;
      $this->cmMomentCreation = new DateTime();
      $this->cmAuthor = $cmAuthor;
      $this->projectId = $projectId;
      $this->cmParentId = $cmParentId;
    }



    private static $attributeList = ["cmId", "cmTextContent", "cmAuthor", "projectId", "cmParentId"];
    
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



    public function save() {
      $db = new Database();
      $pdo = $db->connect();
      if ($this->cmId > 0) {
        // this means the object was retrieved from the DB
        $sql = "UPDATE comments SET cm_text_content = :cm_text_content ";
        $sql .= "WHERE cm_id = :id;";
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":cm_text_content", $this->cmTextContent);
        $query-> bindParam(":cm_id", $this->cmId);

        return $query-> execute();
      } else if ($this->cmId === 0) {
        // this means it's a new object that's being created (not present in the DB)

        // set up the query
        $sql = "INSERT INTO comments (cm_text_content, cm_moment_creation, cm_author, pj_id, cm_parent) ";
        $sql .= "VALUES (:cm_text_content, :cm_moment_creation, :cm_author, :pj_id, :cm_parent)";
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":cm_text_content", $this->cmTextContent, PDO::PARAM_STR);
        $query-> bindParam(":cm_moment_creation", $this->cmMomentCreation, PDO::PARAM_STR);
        $query-> bindParam(":cm_author", $this->cmAuthor, PDO::PARAM_INT);
        $query-> bindParam(":pj_id", $this->projectId, PDO::PARAM_INT);
        $query-> bindParam(":cm_parent", $this->cmParentId, PDO::PARAM_STR);

        return $query-> execute();
      } else {
        return false;
      }
    }



    public function insert() {
      $values = [];
      $values['cm_content'] = $this->cmTextContent;
      $values['cm_author'] = $this->cmAuthor;
      $values['cm_creation_datetime'] = $this->cmMomentCreation->format('Y/m/d H:i:s');
      if ($this->projectId !== 0) {
        $values['cm_pj_id'] = $this->projectId;
      }
      if ($this->projectId !== 0) {
        $values['cm_parent_id'] = $this->cmParentId;
      }
      return inserter('comments', $values);
    }




    // Trouver les commentaires par leur id
    public static function findById(int $cmId) {
      $db = new Database();
      $pdo = $db->connect();
      $sql = "SELECT * FROM comments WHERE cm_id = :cm_id;";
      $query = $pdo->prepare($sql);
      $query->bindParam(":cm_id", $cmId, PDO::PARAM_INT);
      // $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      if ($query->execute()) {
        $results = $query->fetchAll();
        $results = $results[0];
        $comment = new Comment($results['cm_content'], +$results['cm_author'], +$results['cm_pj_id'], +$results['cm_id'], +$results['cm_parent_id']);
        return $comment;
      } // erreur...
    }




    public function edit(string $text) {
      $this->cmTextContent = $text;
      return true;
    }

    public function delete() {

      // set up the PDO
      require_once "Database.php";
      $db = new Database();
      $pdo = $db->connect();

      // set up the query
      $sql = "DELETE FROM comments WHERE cm_id = :cm_id;";
      $query = $pdo-> prepare($sql);
      $query-> bindParam(':cm_id', $this->cmId, PDO::PARAM_STR);

      return $query-> execute();
    }
    
    // public function findAll() {
    //   // set up the PDO
    //   require_once "Database.php";
    //   $db = new Database();
    //   $pdo = $db->connect();
    //   $sql = "SELECT "
    // }

    public static function find1stLevelCommentsByProjectId(int $projectId) {
      // set up the PDO
      $db = new Database();
      $pdo = $db->connect();

      // set up the query
      $sql = "SELECT * FROM comments ";
      $sql .= "JOIN users ON comments.cm_author = users.user_id ";
      $sql .= "WHERE cm_pj_id = :pj_id AND cm_parent_id IS NULL ";
      $sql .= "ORDER BY cm_creation_datetime ASC;";
      $query = $pdo-> prepare($sql);
      $query-> bindParam(':pj_id', $projectId, PDO::PARAM_INT);
      $query-> setFetchMode(PDO::FETCH_ASSOC);
      if ($query-> execute()) {
        $results = $query-> fetchAll();
        return $results;
      } // error...
    }


    public static function count1stLevelCommentsByProjectId(int $projectId) {
      // set up the PDO
      $db = new Database();
      $pdo = $db->connect();
      // set up the query
      $sql = "SELECT COUNT(cm_id) FROM comments ";
      $sql .= "WHERE cm_pj_id = :pj_id AND cm_parent_id IS NULL;";
      $query = $pdo-> prepare($sql);
      $query-> bindParam(':pj_id', $projectId, PDO::PARAM_INT);
      $query-> setFetchMode(PDO::FETCH_ASSOC);
      if ($query-> execute()) {
        $results = $query-> fetchAll();
        return $results[0];
      } // error...
    }





    public static function findSubcomments(int $projectId, int $commentId) {
      // set up the PDO
      $db = new Database();
      $pdo = $db->connect();

      // set up the query
      $sql = "SELECT * FROM comments ";
      $sql .= "JOIN users ON comments.cm_author = users.user_id ";
      $sql .= "WHERE cm_pj_id = :pj_id AND cm_parent_id = :cm_parent_id ";
      $sql .= "ORDER BY cm_creation_datetime ASC;";
      $query = $pdo-> prepare($sql);
      $query-> bindParam(':pj_id', $projectId, PDO::PARAM_INT);
      $query-> bindParam(':cm_parent_id', $commentId, PDO::PARAM_INT);
      $query-> setFetchMode(PDO::FETCH_ASSOC);
      if ($query-> execute()) {
        $results = $query-> fetchAll();
        return $results;
      } // error...
    }


    public static function getLikes(int $cmId) {
      $db = new Database();
      $pdo = $db->connect();
      $sql = "SELECT 
                COUNT(*) AS total_likes,
                CASE
                  WHEN MAX(cm_reactions.cmr_user_id = :current_user_id) = 1 
                  THEN 1
                  ELSE 0
                END AS has_liked 
              FROM cm_reactions 
              WHERE cmr_cm_id = :cm_id;";
      $query = $pdo->prepare($sql);
      $query->bindValue(":cm_id", $cmId, PDO::PARAM_INT);
      $query->bindValue(':current_user_id', $_SESSION['user_id'], PDO::PARAM_INT);
      if ($query->execute()) {
        $results = $query->fetchAll();
        return $results[0];
      }
    }


// this method is called when the user clicks on a like button on a comment under a project 
  /**
  * @param array $likeData contains: cmId, hasLiked, userId
  * @return bool true if successful
  */
  public static function postLike(array $likeData): bool {
    $db = new Database();
    $pdo = $db->connect();
    if ($likeData['hasLiked'] === 0) {
      $sql = "INSERT INTO cm_reactions (cmr_user_id, cmr_cm_id) VALUES (:cmr_user_id, :cmr_cm_id);";
    } else if ($likeData['hasLiked'] === 1) {
      $sql = "DELETE FROM cm_reactions WHERE cmr_user_id = :cmr_user_id AND cmr_cm_id = :cmr_cm_id;";
    }
    $query = $pdo->prepare($sql);
    $query->bindValue(":cmr_user_id", $likeData['userId']);
    $query->bindValue(":cmr_cm_id", $likeData['cmId']);
    return $query->execute();
  }






// this method is called on the landing page to load the last three comments 
  /**
  * @return array|false true if successful
  */
  // public static function getLast3() {
  //   $db = new Database();
  //   $pdo = $db->connect();
  //     $sql = "SELECT * 
  //     FROM comments 
  //     JOIN users 
  //       ON comments.cm_author = users.user_id 
  //     JOIN projects 
  //       ON comments.cm_pj_id = projects.pj_id 
  //     ORDER BY cm_creation_datetime DESC 
  //     LIMIT 3;";
  //   $query = $pdo->prepare($sql);
  //   if ($query->execute()) {
  //     $results = $query->fetchAll(PDO::FETCH_ASSOC);
  //     return $results;
  //   } else {
  //     return false;
  //   }
  // }


// this method is called on the landing page to display the last 3 comments
  /**
  * @return array|false containing the fetched results
  */
  public static function getLast3() {
    $stmt = "SELECT * 
      FROM comments 
      JOIN users 
        ON comments.cm_author = users.user_id 
      JOIN projects 
        ON comments.cm_pj_id = projects.pj_id 
      ORDER BY cm_creation_datetime DESC 
      LIMIT 3;";
    return fetcher($stmt);
  }




  // this method is called when the timestamp in $_SESSION['actualized'] is older than 24h
  /**
  * @param int $userId
  * @return int|bool number of comments liked by the user or false
  */
  public static function countLikes(int $userId) {
    $sql = "SELECT COUNT(cm_reactions.cmr_cm_id) AS likes FROM cm_reactions WHERE cm_reactions.cmr_user_id = :user_id";
    return userFetcher($sql, $userId);
  }




  // this method is called when the timestamp in $_SESSION['actualized'] is older than 24h
  /**
  * @param int $userId
  * @return int|bool number of comments created by the user or false
  */
  public static function countUserComments(int $userId) {
    $sql = "SELECT COUNT(comments.cm_id) AS nbComments FROM comments WHERE comments.cm_author = :user_id";
    return userFetcher($sql, $userId);
  }











  }

