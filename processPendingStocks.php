<?php
  session_start();
  include "includes/db-config.inc.php";
  include 'lib/PendingStockDB.class.php';
  include 'lib/OwnedStocksDB.class.php';

  $DBPendingStock = new PendingStockDB($pdo);
  $DBOwnedStock = new OwnedStockDB($pdo);

  $userId = $_SESSION['User'][0];
  $pendingStocks = $DBPendingStock->findById($userId);

  if(isset($_POST['symbol']) && isset($_POST['subtract'])){

    $ListID = $_POST['symbol'];

    try{
      $stock = $DBPendingStock->findByUserAndSymbol($userId, $ListID);

      $qty = $DBPendingStock->getQty($userId, $ListID);
      $updatedQty = $qty[0] - 1;
      $DBPendingStock->updateQty($userId, $ListID, $updatedQty);

      header("Location: Cart.php");
    }catch(Exception $e){
      echo $e;
    }

  }else if (isset($_POST['symbol']) && isset($_POST['add'])){

    $ListID = $_POST['symbol'];

    try{
      $stock = $DBPendingStock->findByUserAndSymbol($userId, $ListID);

      $qty = $DBPendingStock->getQty($userId, $ListID);
      $updatedQty = $qty[0] + 1;
      $DBPendingStock->updateQty($userId, $ListID, $updatedQty);

      header("Location: Cart.php");
    }catch(Exception $e){
      echo $e;
    }




  }else if (isset($_POST['symbol']) && isset($_POST['purchase'])){
    $ListID = $_POST['symbol'];

    try{
      $callingStock = $DBPendingStock->findByUserAndSymbol($userId, $ListID);

      $DBOwnedStock->createOwnedStock($userId, $ListID, $callingStock['StockName'], $callingStock['StockDescription'], $callingStock['Price'], $callingStock['Qty']);

      $DBPendingStock->deleteStock($userId, $ListID);

      header("Location: Cart.php");
    }catch(Exception $e){
      echo $e;
    }

  }else if (isset($_POST['symbol']) && isset($_POST['cancel'])){
    $ListID = $_POST['symbol'];

    $DBPendingStock->deleteStock($userId, $ListID);
    header("Location: Cart.php");
  }else{
    echo 'something went wrong';
  }




 ?>
