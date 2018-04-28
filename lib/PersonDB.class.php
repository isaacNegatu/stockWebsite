
<?php


  class PersonDB{

    private $pdo = null;

    private static $baseSQL = "SELECT * FROM person";

    public function __construct($connection){
      $this->pdo = $connection;
    }

    public function getAll(){
      $statement = DatabaseHelper::runQuery($this->pdo,
      self::$baseSQL, null);
      return $statement;
    }

    public function findById ($Id){
      $sql = self::$baseSQL . " WHERE UserID_FK=?";
      $statement = DatabaseHelper::runQuery($this->pdo, $sql,
      Array($Id));
      return $statement->fetch();
    }
  }





 ?>
