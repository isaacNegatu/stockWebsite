<?php
  include "lib/PendingStockDB.class.php";
?>

<div class = "stick">
	<div class = "col-md-4 well">
    <?php

    if(isset($_POST['stockSymbol'])){
      $currentStock = strtolower($_POST['stockSymbol']);

      $stockPrice = file_get_contents("https://api.iextrading.com/1.0/stock/" . $currentStock . "/quote?displayPercent=true");

      $stockCompany = file_get_contents("https://api.iextrading.com/1.0/stock/" . $currentStock . "/company?displayPercent=true");

      $priceJSON = json_decode($stockPrice);
      $companyJSON = json_decode($stockCompany);

      try{
        $DBPendingStock = new PendingStockDB($pdo);

        $userId = $_SESSION['User'][0];
        $ListID = $priceJSON->{"symbol"};
        $name = $priceJSON->{"companyName"};
        $description = $companyJSON->{"description"};
        $price = $priceJSON->{"latestPrice"};

        $stock = $DBPendingStock->findByUserAndSymbol($userId, $ListID);


        if($stock){
          $qty = $DBPendingStock->getQty($userId, $ListID);
          $updatedQty = $qty[0] + 1;
          $DBPendingStock->updateQty($userId, $ListID, $updatedQty);
        }else{
          $startQty =  1;
          $DBPendingStock->createPendingStock($userId, $ListID, $name, $description, $price, $startQty);
        }

        $UserStocks = $DBPendingStock->findById($userId);



        if (sizeof($UserStocks) > 0){
          echo '<table class="table table-striped">
           <thead>
             <tr>
               <th scope="col">Name</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
             </tr>
           </thead>
           <tbody>';

          foreach($UserStocks as $row){
            echo "<tr> " .
                      "<td> " . $row[3] . " </td>" .
                      "<td> " . round($row[5], 2) . " </td>" .
                      "<td> " . $row[6] . " </td>" .
                    "</tr>";
          }

          echo " <button class = 'btn btn-success'><a href = 'Cart.php'>View In Cart</a> </button>";
        }else{
          try{
            $DBPerson= new PersonDB($pdo);
            $Id = $_SESSION['User'][0];
            $currentUser = $DBPerson->findById($Id);
            if($currentUser){
              echo $currentUser[2] . ", you currently don't have any pending stocks. Please click the buy buttons on your right to add to your cart.";
            }
          }catch (PDOException $e){
            die($e->getMessage());
          }
        }

      }catch (PDOException $e){
        die($e->getMessage());
      }
      header('Location: stocks.php');
      exit;
    }else{
      try{
        $DBPendingStock = new PendingStockDB($pdo);

        $userId = $_SESSION['User'][0];

        $UserStocks = $DBPendingStock->findById($userId);



        if (sizeof($UserStocks) > 0){

          echo '<table class="table table-striped">
           <thead>
             <tr>
               <th scope="col">Name</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
             </tr>
           </thead>
           <tbody>';

          foreach($UserStocks as $row){
            echo "<tr> " .
                      "<td> " . $row[3] . " </td>" .
                      "<td> " . round($row[5], 2) . " </td>" .
                      "<td> " . $row[6] . " </td>" .
                    "</tr>";
          }

          echo " <a href = 'Cart.php'><button class = 'btn btn-success'>View In Cart </button></a>";
        }else{
          try{
            $DBPerson= new PersonDB($pdo);
            $Id = $_SESSION['User'][0];
            $currentUser = $DBPerson->findById($Id);
            if($currentUser){
              echo $currentUser[2] . ", you currently don't have any pending stocks. Please click the buy buttons on your right to add to your cart.";
            }
          }catch (PDOException $e){
            die($e->getMessage());
          }
        }
      }catch (PDOException $e){
        die($e->getMessage());
        //displayError();
      }
    }


     ?>

   </tbody>
 </table>
	</div>
</div>
