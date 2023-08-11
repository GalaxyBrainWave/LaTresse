<?php 
  class Comment {

    private int $cmId;
    private string $cmTextContent;
    private DateTime $cmMomentCreation;
    private int $cmAuthor;
    private ?int $projectId;
    private ?int $helloThanksId;
    private ?int $cmParentId;



    public function __construct($cmId = 0, $cmTextContent, $cmAuthor, $projectId, $helloThanksId, $cmParentId = null)
    {
      $this-> cmId = $cmId;
      $this-> cmTextContent = $cmTextContent;
      $this-> cmMomentCreation = new DateTime();
      $this-> cmAuthor = $cmAuthor;
      $this-> projectId = $projectId;
      $this-> helloThanksId = $helloThanksId;
      $this-> cmParentId = $cmParentId;
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
      require_once "Database.php";
      $db = new Database();
      $pdo = $db->connect();
      if ($this-> cmId > 0) {
        // this means the object was retrieved from the DB
        $sql = "UPDATE comments SET cm_text_content = :cm_text_content ";
        $sql .= "WHERE cm_id = :id;";
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":cm_text_content", $this-> cmTextContent);
        $query-> bindParam(":cm_id", $this-> cmId);

        return $query-> execute();
      } else if ($this-> cmId === 0) {
        // this means it's a new object that's being created (not present in the DB)

        // set up the query
        $sql = "INSERT INTO comments (cm_text_content, cm_moment_creation, cm_author, ht_id, pj_id, cm_parent) ";
        $sql .= "VALUES (:cm_text_content, :cm_moment_creation, :cm_author, :ht_id, :pj_id, :cm_parent)";
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":cm_text_content", $this-> cmTextContent, PDO::PARAM_STR);
        $query-> bindParam(":cm_moment_creation", $this-> cmMomentCreation, PDO::PARAM_STR);
        $query-> bindParam(":cm_author", $this-> cmAuthor, PDO::PARAM_INT);
        $query-> bindParam(":ht_id", $this-> helloThanksId, PDO::PARAM_INT);
        $query-> bindParam(":pj_id", $this-> projectId, PDO::PARAM_INT);
        $query-> bindParam(":cm_parent", $this-> cmParentId, PDO::PARAM_STR);

        return $query-> execute();
      } else {
        return false;
      }
    }



    public function edit(string $text) {
      $this-> cmTextContent = $text;
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
      $query-> bindParam(':cm_id', $this-> cmId, PDO::PARAM_STR);

      return $query-> execute();
    }
    
    // public function findAll() {
    //   // set up the PDO
    //   require_once "Database.php";
    //   $db = new Database();
    //   $pdo = $db->connect();
    //   $sql = "SELECT "
    // }

    public function findByProjectId(int $projectId) {

      // set up the PDO
      require_once "Database.php";
      $db = new Database();
      $pdo = $db->connect();

      // set up the query
      $sql = "SELECT * FROM comments WHERE pj_id = :pj_id ORDER BY cm_parent;";
      $query = $pdo-> prepare($sql);
      $query-> bindParam(':pj_id', $projectId, PDO::PARAM_INT);
      $query-> setFetchMode(PDO::FETCH_ASSOC);
      if ($query-> execute()) {
        $results = $query-> fetchAll();
        return $results;
      }
    }











  }

