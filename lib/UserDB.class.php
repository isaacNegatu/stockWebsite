
<?php


  class UserDB{

    private $pdo = null;

    private static $baseSQL = "SELECT * FROM user";
    private static $secureSQL = "SELECT Username FROM user";

    public function __construct($connection){
      $this->pdo = $connection;
    }

    public function getUsernameByID ($Id){
      $sql = self::$secureSQL . " WHERE UserID=?";
      $statement = DatabaseHelper::runQuery($this->pdo, $sql,
      Array($Id));
      return $statement->fetch();
    }

    public function getAll(){
      $statement = DatabaseHelper::runQuery($this->pdo,
      self::$baseSQL, null);
      return $statement;
    }

    public function findByUserName($username)
    {
        $sql = self::$baseSQL . " WHERE Username=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($username));
        return $statement->fetch();
    }

    public function findByUserNameAndPassword ($userName, $password){

      $sql = self::$baseSQL . " WHERE Username =? AND Password=?";
      $statement = DatabaseHelper::runQuery($this->pdo, $sql,
      Array($userName, $password));
      return $statement->fetch();
    }

    public function createUser($username, $password){

        $sql = "INSERT INTO user (Username, Password) Values (:Username, :Password)";

        try{
            if (empty($this->findByUserName($username))){
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':Username', $username);
                $stmt->bindValue(':Password', $password);

                $stmt->execute();
            }
            else{
                header("Location: SignUp.php");
                exit;
            }
        }catch (PDOException $e) {
            echo "Error: " . $e.getMessage() ;
        }

    }

    public function updateUsername($username, $userID){
        $sql = "UPDATE user SET username = $username WHERE UserID = $userID";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage() ;
        }catch(Exception $e){
            echo "Error: " . $e->getMessage() ;
        }

    }

  }





 ?>
