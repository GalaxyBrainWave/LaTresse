<?php 
  require_once "../tools/utils.php";
  class Notification {

    private int $nfId;
    private string $nfTextContent;
    private DateTime $nfDateTime;
    private ?int $nfOriginUser;
    private ?int $nfDestinationUser;
    private ?int $nfOriginProjectId;
    // private ?int $nfOriginHelloThanksId;
    private ?int $nfOriginCommentId;
    private ?int $nfGeneratorCommentId;
    private ?bool $isRead;



    public function __construct($nfId = 0, $nfTextContent ='', $nfOriginUser = 0, $nfDestinationUser = 0, $nfOriginProjectId = 0, /*$nfOriginHelloThanksId = null,*/ $nfOriginCommentId = null, $isRead = false, $nfGeneratorCommentId = null)
    {
      $this->nfId = $nfId;
      $this->nfTextContent = $nfTextContent;
      $this->nfDateTime = new DateTime();
      $this->nfOriginUser = $nfOriginUser;
      $this->nfDestinationUser = $nfDestinationUser;
      $this->nfOriginProjectId = $nfOriginProjectId;
      // $this->nfOriginHelloThanksId = $nfOriginHelloThanksId;
      $this->nfOriginCommentId = $nfOriginCommentId;
      $this->isRead = $isRead;
      $this->nfGeneratorCommentId = $nfGeneratorCommentId;
    }



    private static $attributeList = ["nfId", "nfTextContent", "nfOriginUser", "nfDestinationUser", "nfOriginProjectId", "nfGeneratorCommentId", "nfOriginCommentId", "isRead"];
    
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
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if (+$this->nfId > 0) {
        // this means the object was retrieved from the DB
      } else if (+$this->nfId === 0) {
        // this means it's a new entry in in the DB
        $stmt = "INSERT INTO notifications (nf_content, nf_datetime, pj_id, parent_cm_id, origin_user, destination_user, is_read, cm_id) ";
        // file_put_contents('log.txt', var_export('stmt: ' . $stmt, true) . PHP_EOL, FILE_APPEND);die();
        $stmt .= "VALUES (:nf_content, :nf_datetime, :pj_id, :parent_cm_id, :origin_user, :destination_user, :is_read, :cm_id)";
        //file_put_contents('log.txt', var_export($stmt, true) . PHP_EOL, FILE_APPEND);
        $query = $pdo-> prepare($stmt);
        // the following output gives the correct value, yet a wrong value (value+1) is entered in the db
        // file_put_contents('log.txt', var_export('destinationUserId: ' . $this->nfDestinationUser, true) . PHP_EOL, FILE_APPEND);
        $query-> bindValue(":nf_content", $this->nfTextContent, PDO::PARAM_STR);
        $query-> bindValue(":nf_datetime", $this->nfDateTime->format('Y/m/d H:i:s'), PDO::PARAM_STR);
        $query-> bindValue(":pj_id", $this->nfOriginProjectId, PDO::PARAM_INT);
        $query-> bindValue(":parent_cm_id", $this->nfOriginCommentId, PDO::PARAM_INT);
        $query-> bindValue(":origin_user", $this->nfOriginUser, PDO::PARAM_INT);
        $query-> bindValue(":destination_user", $this->nfDestinationUser, PDO::PARAM_INT);
        $query-> bindValue(":is_read", $this->isRead, PDO::PARAM_INT);
        $query-> bindValue(":cm_id", $this->nfGeneratorCommentId, PDO::PARAM_INT);
        $query->execute();
        return true;
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



  // this method is called in the header to check for new notifications
  /**
   * @param int $userId
  * @return int number of new notifications
  */
  public static function getNumberOfNewNotifications(int $userId) {
    $sql = "
      SELECT nf_id 
      FROM notifications 
      WHERE destination_user = :user_id
      AND is_read = 0
    ";
    $notifications = userFetcher($sql, $userId);
    return count($notifications);
  }



  // this method is called in rsnotifications.php to load the user's new notifications
  /**
   * @param int $userId
  * @return array array of notifications
  */
  public static function getNew(int $userId) {
    $sql = "
      SELECT notifications.* , users.first_name, users.avatar_url, comments.cm_content, projects.pj_title
      FROM notifications
      JOIN users ON notifications.origin_user = users.user_id
      JOIN comments ON notifications.cm_id = comments.cm_id
      JOIN projects ON notifications.pj_id = projects.pj_id
      WHERE destination_user = :user_id
      AND is_read = 0
      ORDER BY nf_datetime DESC
    ";
    $notifications = userFetcher($sql, $userId);
    $sql = "
      UPDATE notifications
      SET is_read = 1
      WHERE destination_user = :user_id
      AND is_read = 0
    ";
    paramExecuter('user_id',$userId, $sql);
    return $notifications;
  }



  // this method is called in rsnotifications.php to load the user's new notifications
  /**
   * @param int $userId
  * @return array stringified json to pass on to a js variable
  */
  public static function getOld(int $userId) {
    $sql = "
      SELECT notifications.* , users.first_name, users.avatar_url, comments.cm_content, projects.pj_title
      FROM notifications
      JOIN users ON notifications.origin_user = users.user_id
      JOIN comments ON notifications.cm_id = comments.cm_id
      JOIN projects ON notifications.pj_id = projects.pj_id
      WHERE destination_user = :user_id
      AND is_read = 1
      ORDER BY nf_datetime DESC
      LIMIT 100;
    ";
    $notifications = userFetcher($sql, $userId);
    return $notifications;
  }




  }

