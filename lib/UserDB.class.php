
<?php


  class UserDB{

    private $pdo = null;

    private static $baseSQL = "SELECT * FROM user";

    public function __construct($connection){
      $this->pdo = $connection;
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
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':Username', $username);
                $stmt->bindValue(':Password', $password);

                $stmt->execute();
            }catch (PDOException $e) {
                echo "Error: " . $e.getMessage() ;
            }

    }



  }





 ?>
