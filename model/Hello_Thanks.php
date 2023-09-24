<?php 

  require_once "../tools/utils.php";
  require_once "Database.php";

  class Hello_Thanks {

    private int $htId;
    private string|null $htTextContent;
    private DateTime $htMomentCreation;
    private string|null $htImgURL;
    private ?int $htAuthor;



    public function __construct(int $htAuthor, int $htId = 0, $htTextContent = null, $htImgURL = null)
    {
      $this->htId = $htId;
      $this->htTextContent = $htTextContent;
      $this->htMomentCreation = new DateTime();
      $this->htImgURL = $htImgURL;
      $this->htAuthor = $htAuthor;
    }

    

    // // associates database keys to object keys for saving the data into the DB
    // private static $dbAttributes = [
    //   "userId" => "user_id",
    //   "firstName" => "firstName",
    //   "email" => "user_email",
    //   "hashPass" => "hash_pass",
    //   "colorMode" => "color_mode",
    //   "autoDescription" => "autodescription",
    //   "avatarURL" => "avatar_url",
    //   "bannerURL" => "banner_url",
    //   "nbReactions" => "nb_reactions"
    // ];


    // list of the authorized attributes to be altered by the magic accessors
    private static $attributeList = ["htId", "htTextContent", "htMomentCreation", "htImgURL", "htAuthor"];

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



    // $attributesToUpdate is built on this model: ['dbKey'=>$value] 
    // ex: |$attributesToUpdate = [];
    //     |...
    //     |$attributesToUpdate["banner_url"] = $bannerPath;
    // dbKey is the name of the attribute in the DB, and it should be provided from the files that
    // handle the html forms' output. Not in the html, we don't want that public
    /**
    * @param $attributesToUpdate is an associative array whose keys are the DB's attributes to be updated and values the ones to be added to the DB
    * @return int|null The ID of the inserted row on success, or null on failure
    */
    public function update(array $attributesToUpdate) {
      return updater('hello_thanks', $attributesToUpdate, 'ht_id', $this->htId);
    }


    /**
     * Insert a new row into the database.
     * @return int|null The ID of the inserted row on success, or null on failure.
     */
    public function insert() {
      $values = [];
      $values['ht_text_content'] = $this->htTextContent;
      $values['ht_image_url'] = $this->htImgURL;
      $values['ht_author'] = $this->htAuthor;
      return inserter('hello_thanks', $values);
    }


    // /**
    // * @param int $alreadyShownCards number of already shown wards on the client device
    // * @return array|null The array of results on success, or null on failure
    // */
    // public static function get15(int $alreadyShownCards) {
    //   $db = new Database();
    //   $pdo = $db->connect();
    //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   // return 15 rows starting from the number of already shown cards
    //   $stmt = "SELECT * FROM hello_thanks ORDER BY ht_creation_datetime DESC LIMIT 15 OFFSET " . $alreadyShownCards . ";";
    //   $query = $pdo-> prepare($stmt);
    //   if ($query-> execute()) {
    //     $results = $query->fetchAll();
    //     return $results;
    //   } else {
    //     return null;
    //   }
    // }

    /**
     * @param int $alreadyShownCards Number of already shown cards on the client device
     * @return array|null The array of results on success, or null on failure
     */
    public static function get15(int $alreadyShownCards) {
      $db = new Database();
      $pdo = $db->connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 
      "SELECT 
        hello_thanks.*,
        users.first_name,
        users.avatar_url,
        COUNT(ht_reactions.htr_user_id) AS total_likes,
        CASE
          WHEN MAX(ht_reactions.htr_user_id = :current_user_id) = 1 THEN 1
          ELSE 0
        END AS has_liked
        FROM hello_thanks 
        JOIN users ON hello_thanks.ht_author = users.user_id
        LEFT JOIN ht_reactions ON hello_thanks.ht_id = ht_reactions.htr_ht_id
        GROUP BY hello_thanks.ht_id, users.user_id
        ORDER BY hello_thanks.ht_creation_datetime DESC 
        LIMIT 15 OFFSET :offset;";

      $query = $pdo->prepare($sql);

      // Bind the offset value
      $query->bindValue(':offset', $alreadyShownCards, PDO::PARAM_INT);
      // Bind the current user value
      $query->bindValue(':current_user_id', $_SESSION['user_id'], PDO::PARAM_INT);
      
      try {
          if ($query->execute()) {
              $results = $query->fetchAll(PDO::FETCH_ASSOC);
              // var_dump($results);die();
              return $results;
          } else {
              // Output more meaningful error information
              $errorInfo = $query->errorInfo();
              throw new Exception("Database query failed: " . $errorInfo[2]);
          }
      } catch (Exception $e) {
          // Handle the exception, such as logging or displaying an error message
          // You can also re-throw the exception if desired
          return null;
      }
    }









    public function edit(string $text) {
      $this->cm_text_content = $text;
      return true;
    }

    public function delete() {

      // set up the PDO
      
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
    //   
    //   $db = new Database();
    //   $pdo = $db->connect();
    //   $sql = "SELECT "
    // }

    public function findByProjectId(int $projectId) {

      // set up the PDO
      
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


    public function retrieveId() {
      
      $db = new Database();
      $pdo = $db->connect();

    }






// this method is called when the user clicks on a like button on the rsaccueil page
  /**
  * @param array $likeData contains: cardId, hasLiked, userId
  * @return bool true if successful
  */
  public static function postLike(array $likeData): bool {
    $db = new Database();
    $pdo = $db->connect();
    // file_put_contents('log.txt', gettype($likeData['hasLiked']));
    if ($likeData['hasLiked'] === '0') {
      $sql = "INSERT INTO ht_reactions (htr_user_id, htr_ht_id) VALUES (:htr_user_id, :htr_ht_id);";
    } else if ($likeData['hasLiked'] === '1') {
      $sql = "DELETE FROM ht_reactions WHERE htr_user_id = :htr_user_id AND htr_ht_id = :htr_ht_id;";
    }
    // file_put_contents('log.txt', $sql);
    $query = $pdo->prepare($sql);
    $query->bindValue(":htr_user_id", $likeData['userId']);
    $query->bindValue(":htr_ht_id", $likeData['cardId']);
    return $query->execute();
  }




  // this method is called when the timestamp in $_SESSION['actualized'] is older than 24h
  /**
  * @param int $userId
  * @return int|bool number of HTcards liked by the user or false
  */
  public static function countLikes(int $userId) {
    $sql = "SELECT COUNT(ht_reactions.htr_ht_id) AS likes FROM ht_reactions WHERE ht_reactions.htr_user_id = :user_id";
    return userFetcher($sql, $userId);
  }



  // this method is called when the timestamp in $_SESSION['actualized'] is older than 24h
  /**
  * @param int $userId
  * @return int|bool number of hello/thanks created by the user or false
  */
  public static function countUserHTs(int $userId) {
    $sql = "SELECT COUNT(hello_thanks.ht_id) AS nbHTs FROM hello_thanks WHERE hello_thanks.ht_author = :user_id";
    return userFetcher($sql, $userId);
  }



  // this method is called one the user's page
  /**
  * @param int $userId
  * @return array|bool stringified json to pass on to a js variable
  */
  public static function findByUser(int $userId) {
    $sql = "
    SELECT hello_thanks.*, users.first_name, users.avatar_url
    FROM hello_thanks
    JOIN users ON hello_thanks.ht_author = users.user_id
    WHERE hello_thanks.ht_author = :user_id
    ORDER BY ht_creation_datetime DESC
    -- LIMIT 15
    ";
    $htList = userFetcher($sql, $userId);
    foreach($htList as &$ht) {
      $sql = "
        SELECT COUNT(ht_reactions.htr_user_id) AS total_likes
        /*CASE
          WHEN MAX(ht_reactions.htr_user_id = :current_user_id) = 1 
          THEN 1
          ELSE 0
        END AS has_liked*/
        FROM ht_reactions WHERE ht_reactions.htr_ht_id = :ht_id;
      ";
      $ht['total_likes'] = paramFetcher('ht_id', +$ht['ht_id'], $sql)[0]['total_likes'];
    }
    unset($ht);
    return $htList;
  }

  }

