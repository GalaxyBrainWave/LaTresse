<?php 
  class Hello_Thanks {

    private int $htId;
    private string $htTextContent;
    private DateTime $htMomentCreation;
    private int $htMedia;
    private ?int $htAuthor;



    public function __construct($htId = 0, $htTextContent, $htMedia, $htAuthor)
    {
      $this-> htId = $htId;
      $this-> htTextContent = $htTextContent;
      $this-> htMomentCreation = new DateTime();
      $this-> htMedia = $htMedia;
      $this-> htAuthor = $htAuthor;
    }



    private static $attributeList = ["htId", "htTextContent", "htMedia", "htAuthor"];
    
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
        $query-> bindParam(":cm_text_content", $this-> cm_text_content);
        $query-> bindParam(":cm_id", $this-> cm_id);

        return $query-> execute();
      } else if ($this-> cmId === 0) {
        // this means it's a new object that's being created (not present in the DB)

        // set up the query
        $sql = "INSERT INTO comments (cm_text_content, cm_date_creation, cm_author, ht_id, pj_id, cm_parent) ";
        $sql .= "VALUES (:cm_text_content, :cm_date_creation, :cm_author, :ht_id, :pj_id, :cm_parent)";
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":cm_text_content", $this-> cm_text_content, PDO::PARAM_STR);
        $query-> bindParam(":cm_date_creation", $this-> cm_date_creation, PDO::PARAM_STR);
        $query-> bindParam(":cm_author", $this-> cm_author, PDO::PARAM_INT);
        $query-> bindParam(":ht_id", $this-> ht_id, PDO::PARAM_INT);
        $query-> bindParam(":pj_id", $this-> pj_id, PDO::PARAM_INT);
        $query-> bindParam(":cm_parent", $this-> cm_parent, PDO::PARAM_STR);

        return $query-> execute();
      } else {
        return false;
      }
    }



    public function edit(string $text) {
      $this-> cm_text_content = $text;
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

