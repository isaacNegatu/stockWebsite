
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

    public function findByUserNameAndPassword ($userName, $password){

      $sql = self::$baseSQL . " WHERE Username =? AND Password=?";
      $statement = DatabaseHelper::runQuery($this->pdo, $sql,
      Array($userName, $password));
      return $statement->fetch();
    }



  }





 ?>
