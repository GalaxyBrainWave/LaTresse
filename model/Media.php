<?php
class Media {
    private int $mediaId;
    private string $mediaType;
    private ?string $mediaUrl;
    private array $medias;
    private array $articles;
    private array $projects;
    private array $helloThanks;

    public function __construct(int $mediaId=0, string $mediaType="", string $mediaUrl="") {
        $this->mediaId = $mediaId;
        $this->mediaType = $mediaType;
        $this->mediaUrl = $mediaUrl;
        $this->medias = array();
        $this->articles = array();
        $this->projects = array();
        $this->helloThanks = array();
    }

    // Accesseur magique
    public function __get($attribute) {
        return $this->$attribute;
    }

    public function __set($attribute, $value) {
        switch ($attribute) {
            case "medias":
                $this->$attribute = array($value);
                break;
            case "articles":
                $this->$attribute = array($value);
                break;
            case "projects":
                $this->$attribute = array($value);
                break;
            case "helloThanks":
                $this->$attribute = array($value);
                break;
            default:
                $this->$attribute = $value;
        }
    }

    // CRUD
    public function save() {
        try {
            if ($this->mediaId > 0) {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "UPDATE medias SET media_type = :media_type  WHERE media_id = :media_id;";

                $query = $pdo->prepare($sql);
                $query->bindParam(":media_id", $this->mediaId, PDO::PARAM_INT);
                $query->bindParam(":media_type", $this->mediaType, PDO::PARAM_STR);
                $query->bindParam(":media_url", $this->mediaUrl, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "INSERT INTO medias (media_type, media_url) VALUES (:media_type, :media_url);";

                $query = $pdo->prepare($sql);
                $query->bindParam(":media_type", $this->mediaType, PDO::PARAM_STR);
                $query->bindParam(":media_url", $this->mediaUrl, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function edit() {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "UPDATE medias SET media_type = :media_type  WHERE media_id = :media_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":media_id", $this->mediaId, PDO::PARAM_INT);
                $query->bindParam(":media_type", $this->mediaType, PDO::PARAM_STR);
                $query->bindParam(":media_url", $this->mediaUrl, PDO::PARAM_STR);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function delete(int $mediaId) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "DELETE FROM medias WHERE media_id = :media_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":media_id", $mediaId, PDO::PARAM_INT);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findAll() {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM medias ORDER BY media_id DESC;";

            $query = $pdo->prepare($sql);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Media");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findById(int $mediaId) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM medias WHERE media_id = :media_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":media_id", $mediaId, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Media");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findByUrl(string $mediaUrl) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM medias WHERE media_url = :media_url;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":media_url", $mediaUrl, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Media");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function loadAllMedias() {
        require_once "Media.php";

        $this->medias = Media::findById($this->mediaId);
    }

    public function loadAllArticles() {
        require_once "Article.php";

        $this->articles = Article::findById($this->articleId);
    }
}

