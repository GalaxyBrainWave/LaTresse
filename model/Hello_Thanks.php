<?php 

  require_once "../rs/utils.php";
  require_once "Database.php";

  class Hello_Thanks {

    private int $htId;
    private string $htTextContent;
    private DateTime $htMomentCreation;
    private string $htImgURL;
    private ?int $htAuthor;



    public function __construct(int $htAuthor, int $htId = 0, $htTextContent = null, $htImgURL = null)
    {
      $this-> htId = $htId;
      $this-> htTextContent = $htTextContent;
      $this-> htMomentCreation = new DateTime();
      $this-> htImgURL = $htImgURL;
      $this-> htAuthor = $htAuthor;
    }


    // list of the authorized attributes to be altered by the magic accessors
    private static $attributeList = ["htId", "htTextContent", "htMomentCreation", "htImgURL", "htAuthor"];
    

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

      $stmt = "SELECT * FROM hello_thanks JOIN users WHERE hello_thanks.ht_author = users.user_id ORDER BY ht_creation_datetime DESC LIMIT 15 OFFSET :offset;";
      $query = $pdo->prepare($stmt);

      // Bind the offset value
      $query->bindValue(':offset', $alreadyShownCards, PDO::PARAM_INT);
      
      try {
          if ($query->execute()) {
              $results = $query->fetchAll(PDO::FETCH_ASSOC);
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
      $this-> cm_text_content = $text;
      return true;
    }

    public function delete() {

      // set up the PDO
      
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








  }

