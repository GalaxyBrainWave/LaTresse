<?php

class message {
    private int $msgId;
    private string $msgFirstName;
    private string $msgEmail;
    private ?string $msgObject;
    private string $msgContent;
    private DateTime $msgCreationDate;
    private int $user;
    private array $messages;

    // Constructeur
    public function __construct($msgId=0, $msgFirstName="", $msgEmail="", $msgObject="", $msgContent="", $user=0) {
        $this->msgId = $msgId;
        $this->msgFirstName = $msgFirstName;
        $this->msgEmail = $msgEmail;
        $this->msgObject = $msgObject;
        $this->msgContent = $msgContent;
        $this->msgCreationDate = new DateTime();
        $this->user = $user;
        $this->messages = array();
    }

    // Accesseur magique
    public function __get($attribute) {
        return $this->$attribute;
    }
    public function __set($attribute, $value) {
        switch ($attribute) {
            case "msgCreationDate":
                $this->$attribute = new DateTime($value);
                break;
            case "messages":
                $this->$attribute = array($value);
                break;
            default:
                $this->$attribute = $value;
        }
    }
    
    // CRUD
    public function save() {
        try {
            if ($this->msgId > 0) {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "UPDATE messages SET msg_first_name = :msg_first_name, msg_email = :msg_email, msg_object = :msg_object, msg_content = :msg_content WHERE msg_id = :msg_id;";

                $query = $pdo->prepare($sql);
                $query->bindParam(":msg_id", $this->msgId, PDO::PARAM_INT);
                $query->bindParam(":msg_first_name", $this->msgFirstName, PDO::PARAM_STR);
                $query->bindParam(":msg_email", $this->msgEmail, PDO::PARAM_STR);
                $query->bindParam(":msg_object", $this->msgObject, PDO::PARAM_STR);
                $query->bindParam(":msg_content", $this->msgContent, PDO::PARAM_STR);

                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                require_once "Database.php";

                $db = new Database();
                $pdo = $db->connect();

                $sql = "INSERT INTO articles (msg_first_name, msg_email, msg_object, msg_content) VALUES (:art_title, :art_content);";

                $query = $pdo->prepare($sql);
                $query->bindParam(":msg_first_name", $this->msgFirstName, PDO::PARAM_STR);
                $query->bindParam(":msg_email", $this->msgEmail, PDO::PARAM_STR);
                $query->bindParam(":msg_object", $this->msgObject, PDO::PARAM_STR);
                $query->bindParam(":msg_content", $this->msgContent, PDO::PARAM_STR);

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

            $sql = "UPDATE messages SET msg_first_name = :msg_first_name, msg_email = :msg_email, msg_object = :msg_object, msg_content = :msg_content WHERE msg_id = :msg_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":msg_id", $this->msgId, PDO::PARAM_INT);
            $query->bindParam(":msg_first_name", $this->msgFirstName, PDO::PARAM_STR);
            $query->bindParam(":msg_email", $this->msgEmail, PDO::PARAM_STR);
            $query->bindParam(":msg_object", $this->msgObject, PDO::PARAM_STR);
            $query->bindParam(":msg_content", $this->msgContent, PDO::PARAM_STR);

            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function delete(int $msgId) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "DELETE FROM messages WHERE msg_id = :msg_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":msg_id", $msgId, PDO::PARAM_INT);

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

            $sql = "SELECT * FROM messages ORDER BY msg_id DESC;";

            $query = $pdo->prepare($sql);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Message");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findById(int $msgId) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM messages WHERE msg_id = :msg_id;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":msg_id", $msgId, PDO::PARAM_INT);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Message");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public static function findByEmail(string $msgEmail) {
        try {
            require_once "Database.php";

            $db = new Database();
            $pdo = $db->connect();

            $sql = "SELECT * FROM messages WHERE msg_email = :msg_email;";

            $query = $pdo->prepare($sql);
            $query->bindParam(":msg_email", $msgEmail, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Message");

            if ($query->execute()) {
                $results = $query->fetchAll();
                return $results;
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function loadAllMessages() {
        require_once "Message.php";

        $this->messages = Message::findById($this->msgId);
    }
}

