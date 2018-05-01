
<?php


  class PendingStockDB{

    private $pdo = null;

    private static $baseSQL = "SELECT * FROM pendingstocks";

    public function __construct($connection){
      $this->pdo = $connection;
    }


    public function createPendingStock($UserID, $ListID, $name, $description, $price, $qty){
      $sql = "INSERT INTO pendingstocks(UserID_FK, ListID, StockName, StockDescription, Price, Qty) VALUES (:UserID, :ListID, :StockName, :StockDescription , :Price, :Qty)";

      try{
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':UserID', $UserID);
        $stmt->bindValue(':ListID', $ListID);
        $stmt->bindValue(':StockName', $name);
        $stmt->bindValue(':StockDescription', $description);
        $stmt->bindValue(':Price', $price);
        $stmt->bindValue(':Qty', $qty);

        $stmt->execute();
      }catch(Exception $e){
        echo $e;
      }
    }


    public function getAll(){
      $statement = DatabaseHelper::runQuery($this->pdo,
      self::$baseSQL, null);
      return $statement;
    }

    public function findById($Id){
      $sql = self::$baseSQL . " WHERE UserID_FK=?";
      $statement = DatabaseHelper::runQuery($this->pdo, $sql,
      Array($Id));
      return $statement->fetchAll();
    }

    public function findByUserAndSymbol($userId, $symbol)
    {
        $sql = self::$baseSQL . " WHERE UserID_FK=? AND ListID=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($userId, $symbol));
        return $statement->fetch();
    }

    public function getQty ($userId, $ListID){
      $sql = "SELECT Qty FROM pendingstocks WHERE UserID_FK=? AND ListID=?";
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($userId, $ListID));
      return $statement->fetch();
    }

    public function updateQty($userId, $ListID, $qty){
      $sql = "UPDATE pendingstocks SET Qty=? WHERE UserID_FK=? AND ListID=?";
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($qty, $userId, $ListID));
    }

  }





 ?>
