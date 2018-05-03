<?php
  include "lib/OwnedStocksDB.class.php";

  try{

    $DBOwnedStock = new OwnedStockDB($pdo);

    $userId = $_SESSION['User'][0];

    $UserStocks = $DBOwnedStock->findById($userId);

    if (sizeof($UserStocks) > 0){

      foreach($UserStocks as $row){
        $totalPrice = round($row['PricePurchased'] * $row['Qty']);
        echo "<div class = 'panel panel-info'>
          <div class = 'panel-heading'>" . $row['StockName'] . "</div> " .
          "<div class = 'panel-body'>
          <table class='table table-striped'>
             <thead>
               <tr>
                 <th scope='col'>Symbol</th>
                 <th scope='col'>Name</th>
                 <th scope='col'>Price</th>
                 <th scope='col'>Total Price</th>
               </tr>
             </thead>
             <tbody>
               <tr> " .
                  "<td> " . $row['ListID'] . " </td>" .
                  "<td> " . $row['StockName'] . " </td>" .
                  "<td> " . round($row['PricePurchased'], 2) . " </td>" .
                  "<td> " . $totalPrice . "  </td>" .
                "</tr>".
                "<tr>
                  <td colspan = '5'>". $row['StockDescription'] . "</td>
                </tr>
              </tbody>
            </table>
                <form action = 'processPendingStocks.php' method = 'POST'>
                  <input name = 'symbol' value = '" . $row[2] . "' hidden/>
                  <button type = 'submit' class='btn  btn-default' name = 'purchase'>Sell Stock</button>
                </form>
            </div>
          </div>";
      }

    }else{
      try{
        $DBPerson= new PersonDB($pdo);
        $Id = $_SESSION['User'][0];
        $currentUser = $DBPerson->findById($Id);
        if($currentUser){
          echo "<br /> " . $currentUser[2] . ", you currently don't own any stocks. Please go to the stocks page to browse stocks.";
        }
      }catch (PDOException $e){
        die($e->getMessage());
      }
    }
  }catch(Exception $e){
    echo $e;
  }



?>
