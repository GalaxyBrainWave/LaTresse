<?php 
  require_once "Database.php";
  require_once "../rs/utils.php";

  class Comment {

    private int $cmId;
    private string $cmTextContent;
    private DateTime $cmMomentCreation;
    private int $cmAuthor;
    private ?int $projectId;
    private ?int $helloThanksId;
    private ?int $cmParentId;



    public function __construct($cmTextContent, $cmAuthor, $projectId = 0, $helloThanksId = 0, $cmId = 0, $cmParentId = 0)
    {
      $this->cmId = $cmId;
      $this->cmTextContent = $cmTextContent;
      $this->cmMomentCreation = new DateTime();
      $this->cmAuthor = $cmAuthor;
      $this->projectId = $projectId;
      $this->helloThanksId = $helloThanksId;
      $this->cmParentId = $cmParentId;
    }



    private static $attributeList = ["cmId", "cmTextContent", "cmAuthor", "projectId", "helloThanksId", "cmParentId"];
    
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
        $sql = "INSERT INTO comments (cm_text_content, cm_moment_creation, cm_author, ht_id, pj_id, cm_parent) ";
        $sql .= "VALUES (:cm_text_content, :cm_moment_creation, :cm_author, :ht_id, :pj_id, :cm_parent)";
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":cm_text_content", $this->cmTextContent, PDO::PARAM_STR);
        $query-> bindParam(":cm_moment_creation", $this->cmMomentCreation, PDO::PARAM_STR);
        $query-> bindParam(":cm_author", $this->cmAuthor, PDO::PARAM_INT);
        $query-> bindParam(":ht_id", $this->helloThanksId, PDO::PARAM_INT);
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
      if ($this->helloThanksId !== 0) {
        $values['cm_ht_id'] = $this->helloThanksId;
      }
      if ($this->projectId !== 0) {
        $values['cm_parent_id'] = $this->cmParentId;
      }
      return inserter('comments', $values) != null;
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


    public static function getNumberOflikes(int $cmId) {
      $db = new Database();
      $pdo = $db->connect();
      $sql = "SELECT COUNT(*) FROM cm_reactions WHERE cmr_cm_id = :cm_id;";
      $query = $pdo->prepare($sql);
      $query->bindParam(":cm_id", $cmId, PDO::PARAM_INT);
      if ($query->execute()) {
        $results = $query->fetchAll();
        // file_put_contents('log.txt', var_export((int)$results[0]['COUNT(*)'], true) . PHP_EOL, FILE_APPEND);
        return $results[0]['COUNT(*)'];
      }
    }







  }

