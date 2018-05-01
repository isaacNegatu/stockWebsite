<?php
  include "lib/PendingStockDB.class.php";

  try{

    $DBPendingStock = new PendingStockDB($pdo);

    $userId = $_SESSION['User'][0];

    $UserStocks = $DBPendingStock->findById($userId);

    if (sizeof($UserStocks) > 0){

      echo '</br> <table class="table table-striped">
         <thead>
           <tr>
             <th scope="col">Symbol</th>
             <th scope="col">Name</th>
             <th scope="col">Price</th>
             <th scope="col">Quantity</th>
             <th scope="col">Total Price</th>
           </tr>
         </thead>';


      foreach($UserStocks as $row){
        $totalPrice = round($row[5], 2) * $row[6];
        echo "<tr> " .
                "<td> " . $row[2] . " </td>" .
                "<td> " . $row[3] . " </td>" .
                "<td> " . round($row[5], 2) . " </td>" .
                "<td> " . $row[6] . " </td>" .
                "<td> " . $totalPrice . "  </td>" .
              "</tr>".
              "<tr>
                <td colspan = '5'>". $row[4] . "</td>
              </tr>";
      }

    }else{
      try{
        $DBPerson= new PersonDB($pdo);
        $Id = $_SESSION['User'][0];
        $currentUser = $DBPerson->findById($Id);
        if($currentUser){
          echo "<br /> " . $currentUser[2] . ", you currently don't have any pending stocks. Please go to the stocks page to view stocks.";
        }
      }catch (PDOException $e){
        die($e->getMessage());
      }
    }
  }catch(Exception $e){
    echo $e;
  }



?>
