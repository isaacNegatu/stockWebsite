<?php


  class OwnedStockDB{

    private $pdo = null;

    private static $baseSQL = "SELECT * FROM ownedstocks";

    public function __construct($connection){
      $this->pdo = $connection;
    }


    public function createOwnedStock($UserID, $ListID, $name, $description, $pricePurchased, $qty){
      $sql = "INSERT INTO ownedstocks(UserID_FK, ListID, StockName, StockDescription, PricePurchased, Qty) VALUES (:UserID, :ListID, :StockName, :StockDescription , :PricePurchased, :Qty)";

      try{
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':UserID', $UserID);
        $stmt->bindValue(':ListID', $ListID);
        $stmt->bindValue(':StockName', $name);
        $stmt->bindValue(':StockDescription', $description);
        $stmt->bindValue(':PricePurchased', $pricePurchased);
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


  }

 ?>
