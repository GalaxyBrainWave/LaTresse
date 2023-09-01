<?php
  require_once "../rs/utils.php";
  require_once "Database.php";
				
  class Project {
    private int $pjId;
    private int $pjAuthor;
    private string $pjTitle;
    private string $pjDescription;
    private string $pjCreationDateTime;
    private ?string $pjCategory;
    private ?string $pjLocation;
    private ?int $pjBudget;
    private ?string $pjBannerURL;
    private ?string $pjPic1URL;
    private ?string $pjPic2URL;
    private ?string $pjPic3URL;
    private ?string $pjPic4URL;
    // private array $projects;
    // private ?array $categories;

    // public function __construct($pjId = 0, $pjAuthor = 0, $pjTitle = "", $pjDescription = "", $pjCreationDateTime = (new DateTime()), $pjCategory = '', $pjLocation = '', $pjBudget = 0, $pjBannerURL = 'defaultBannerURL (à faire)', $pjPic1URL = '', $pjPic2URL = '', $pjPic3URL = '', $pjPic4URL = '') {
    public function __construct($pjId, $pjAuthor, $pjTitle, $pjDescription, $pjCreationDateTime, $pjCategory, $pjLocation, $pjBudget, $pjBannerURL, $pjPic1URL, $pjPic2URL, $pjPic3URL, $pjPic4URL) {
      $this->pjId = $pjId;
      $this->pjAuthor = $pjAuthor;
      $this->pjTitle = $pjTitle;
      $this->pjDescription = $pjDescription;
      $this->pjCreationDateTime = $pjCreationDateTime;
      $this->pjCategory = $pjCategory;
      $this->pjLocation = $pjLocation;
      $this->pjBudget = $pjBudget;
      $this->pjBannerURL = $pjBannerURL;
      $this->pjPic1URL = $pjPic1URL;
      $this->pjPic2URL = $pjPic2URL;
      $this->pjPic3URL = $pjPic3URL;
      $this->pjPic4URL = $pjPic4URL;
    }

    public function __get($attribute) {
      return $this->$attribute;
    }
    public function __set($attribute, $value) {
      switch ($attribute) {
        case "pjId":
          if ($value > 0) {
            $this->$attribute = $value;
          } else {
            $this->$attribute = 0;
          }
          break;
        case "pjCreationDate":
          $this->$attribute = new DateTime($value);
          break;
        case "projects":
          $this->$attribute = array($value);
          break;
        case "categories":
          $this->$attribute = array($value);
          break;
        default:
          $this->$attribute = $value;
      }
    }   

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
    public static function findAll() {
      

      $db = new Database();
      $pdo = $db->connect();

      $sql = "SELECT * FROM projects ORDER BY pj_id DESC;";

      $query = $pdo->prepare($sql);
      $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");

      if ($query->execute()) {
        $results = $query->fetchAll();
        return $results;
      }
    }

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
        // var_dump($results);die();
        $date = new DateTIme($results['pj_creation_date']);
        $date = $date->format('d/m/Y H:i');
        $project = new Project($results['pj_id'], (int)$results['pj_author'], $results['pj_title'], $results['pj_description'], $date, $results['pj_category'], $results['pj_location'], $results['pj_budget'], $results['pj_bannerURL'], $results['pj_pic1URL'], $results['pj_pic2URL'], $results['pj_pic3URL'], $results['pj_pic4URL']);
        return $project;
        // return $results[0];
      } // erreur...
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

    public static function findByCategory(int $category) {
      

      $db = new Database();
      $pdo = $db->connect();

      $sql = "SELECT * FROM projects INNER JOIN projects_categories ON pj_id = project INNER JOIN categories ON category = cat_id WHERE cat_id = :cat_id;";

      $query = $pdo->prepare($sql);
      $query->bindParam(":cat_id", $category, PDO::PARAM_INT);
      $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Project");

      if ($query->execute()) {
        $results = $query->fetchAll();
        return $results;
      }
    }

    public function loadAllProjects() {
      require_once "Project.php";

      $this->projects = Project::findById($this->pjId);
    }
  }