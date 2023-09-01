<?php 
  class Notification {

    private int $nfId;
    private string $nfTextContent;
    private DateTime $nfDateTime;
    private int $nfOriginUser;
    private ?int $nfOriginProjectId;
    private ?int $nfOriginHelloThanksId;
    private ?int $nfOriginCommentId;



    public function __construct($nfId = 0, $nfTextContent, $nfOriginUser, 
    $nfOriginProjectId, $nfOriginHelloThanksId, $nfOriginCommentId)
    {
      $this->nfId = $nfId;
      $this->nfTextContent = $nfTextContent;
      $this->nfDateTime = new DateTime();
      $this->nfOriginUser = $nfOriginUser;
      $this->nfOriginProjectId = $nfOriginProjectId;
      $this->nfOriginHelloThanksId = $nfOriginHelloThanksId;
      $this->nfOriginCommentId = $nfOriginCommentId;
    }



    private static $attributeList = ["nfId", "nfTextContent", "nfOriginUser", "nfOriginProjectId", 
    "nfOriginHelloThanksId", "nfOriginCommentId"];
    
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
      if ($this->nfId > 0) {
        // this means the object was retrieved from the DB
        $stmt = "UPDATE notifications SET (nf_content, ht_id, cm_id) VALUES (:nf_content, ht_id, cm_id);";
        $stmt .= "WHERE cm_id = :id;";
        $query = $pdo-> prepare($stmt);
        $query-> bindParam(":cm_text_content", $this->cm_text_content);
        $query-> bindParam(":cm_id", $this->nfOriginCommentId);

        return $query-> execute();
      } else if ($this->cmId === 0) {
        // this means it's a new object that's being created (not present in the DB)

        // set up the query
        $stmt = "INSERT INTO comments (cm_text_content, cm_date_creation, cm_author, ht_id, pj_id, cm_parent) ";
        $stmt .= "VALUES (:cm_text_content, :cm_date_creation, :cm_author, :ht_id, :pj_id, :cm_parent)";
        $query = $pdo-> prepare($stmt);
        $query-> bindParam(":cm_text_content", $this->cm_text_content, PDO::PARAM_STR);
        $query-> bindParam(":cm_date_creation", $this->cm_date_creation, PDO::PARAM_STR);
        $query-> bindParam(":cm_author", $this->cm_author, PDO::PARAM_INT);
        $query-> bindParam(":ht_id", $this->ht_id, PDO::PARAM_INT);
        $query-> bindParam(":pj_id", $this->pj_id, PDO::PARAM_INT);
        $query-> bindParam(":cm_parent", $this->cm_parent, PDO::PARAM_STR);

        return $query-> execute();
      } else {
        return false;
      }
    }



    public function edit(string $text) {
      $this->cm_text_content = $text;
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

