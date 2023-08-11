<?php
class Article {
    private int $articleId; 
    private string $artTitle;
    private string $artTextContent;
    private DateTime $artPublicationDate;
    private int $user;
    private int $media;
    private array $articles;
    private array $medias;

    // Constructeur
    public function __construct($articleId=0, $artTitle="", $artTextContent="", $user = 0, $media = 0) {
        $this->articleId = $articleId;
        $this->artTitle = $artTitle;
        $this->artTextContent = $artTextContent;
        $this->artPublicationDate = new DateTime();
        $this->user = $user;
        $this->media = $media;
        $this->articles = array();
        $this->medias = array();
    }

    // Accesseur magique
    public function __get($attribute) {
        return $this->$attribute;
    }
    public function __set($attribute, $value) {
        switch ($attribute) {
            case "artPublicationDate":
                $this->$attribute = new DateTime($value);
                break;
            case "articles":
                $this->$attribute = array($value);
                break;
            default:
                $this->$attribute = $value;
        }
    }

    // Accesseurs de classe
    // public function getArticleId(): int {
    //     return $this->articleId;
    // }

    // public function setArticleId(int $new_id): void {
    //     $this->articleId = $new_id;
    // }

    // public function getArtTitle(): string {
    //     return $this->artTitle;
    // }

    // public function setArtTitle(string $new_title): void {
    //     $this->artTitle = $new_title;
    // }

    // public function getArtTextContent(): string {
    //     return $this->artTextContent;
    // }

    // public function setArtTextContent(string $new_text): void {
    //     $this->artTextContent = $new_text;
    // }

    // public function getArtPublicationDate(): DateTime {
    //     return $this->artPublicationDate;
    // }

    // public function setArtPublicationDate(string $new_date): void {
    //     $this->artPublicationDate = new DateTime($new_date);
    // }

    // public function getUser(): int {
    //     return $this->user;
    // }

    // public function setUser(int $new_user): void {
    //     $this->user = $new_user;
    // }

    // public function getMedias(): array {
    //     return $this->medias;
    // }

    // public function setMedias(array $new_medias): void {
    //     $this->medias = $new_medias;
    // }

    // CRUD Méthodes utilitaires 
    public function save() {
        try {
            if ($this->articleId > 0) {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "UPDATE articles SET art_title = :art_title, art_content = :art_content WHERE article_id = :article_id;";

                $query = $pdo->prepare($sql);
                $query->bindParam(":article_id", $this->articleId, PDO::PARAM_INT);
                $query->bindParam(":art_title", $this->artTitle, PDO::PARAM_STR);
                $query->bindParam(":art_content", $this->artTextContent, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "INSERT INTO articles (art_title, art_content) VALUES (:art_title, :art_content);";

                $query = $pdo->prepare($sql);
                $query->bindParam(":art_title", $this->artTitle, PDO::PARAM_STR);
                $query->bindParam(":art_content", $this->artTextContent, PDO::PARAM_STR);

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

            $sql = "UPDATE articles SET art_title = :art_title, art_content = :art_content WHERE article_id = :article_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":article_id", $this->articleId, PDO::PARAM_INT);
            $query->bindParam(":art_title", $this->artTitle, PDO::PARAM_STR);
            $query->bindParam(":art_content", $this->artTextContent, PDO::PARAM_STR);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function delete(int $articleId) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "DELETE FROM articles WHERE articleId = :articleId;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":article_id", $articleId, PDO::PARAM_INT);

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

            $sql = "SELECT * FROM articles ORDER BY article_id DESC;";

            $query = $pdo->prepare($sql);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Article");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findById(int $articleId) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM articles WHERE article_id = :article_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":article_id", $articleId, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Article");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findByTitle(string $artTitle) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM articles WHERE art_title = :art_title;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":art_title", $artTitle, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Article");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findByMedia(int $media) {
        require_once "Database.php";

        $db = new Database();
        $pdo = $db->connect();

        $sql = "SELECT * FROM articles INNER JOIN articles_medias ON article_id = article INNER JOIN medias ON media = media_id WHERE media_id = :media_id;";

        $query = $pdo->prepare($sql);
        $query->bindParam(":media_id", $media, PDO::PARAM_INT);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Media");

        if ($query->execute()) {
            $results = $query->fetchAll();
            return $results;
        }
    }

    public function loadAllArticles() {
        require_once "Article.php";

        $this->articles = Article::findById($this->articleId);
    }
}

