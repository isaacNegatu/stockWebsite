<?php
  include "lib/PendingStockDB.class.php";

  try{

    $DBPendingStock = new PendingStockDB($pdo);

    $userId = $_SESSION['User'][0];

    $UserStocks = $DBPendingStock->findById($userId);

    if (sizeof($UserStocks) > 0){

      foreach($UserStocks as $row){
        $totalPrice = round($row[5], 2) * $row[6];
        echo "<div class = 'panel panel-info'>
          <div class = 'panel-heading'>" . $row[3] . "</div> " .
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
                  "<td> " . $row[2] . " </td>" .
                  "<td> " . $row[3] . " </td>" .
                  "<td> " . round($row[5], 2) . " </td>" .
                  "<td> " . $totalPrice . "  </td>" .
                "</tr>".
                "<tr>
                  <td colspan = '5'>". $row[4] . "</td>
                </tr>
              </tbody>
            </table>

              <div class = 'row'>
                <div class = 'col-md-4 col-md-offset-4'>
                  <div class = 'row'>
                    <div class = 'col-sm-5'>
                    <form class = 'inc df' action = 'processPendingStocks.php' method = 'POST'>
                      <input name = 'symbol' value = '" . $row[2] . "' hidden/>
                      <button type = 'submit' class='btn  btn-default' name = 'subtract'><span class = 'glyphicon glyphicon-minus'></span></button>
                    </form>
                    </div>
                    <div class = 'col-sm-2'>
                    ". $row[6] ."
                    </div>
                    <div class = 'col-sm-5'>
                    <form class = 'inc sf' action = 'processPendingStocks.php' method = 'POST'>
                      <input name = 'symbol' value = '" . $row[2] . "' hidden/>
                      <button type = 'submit' class='btn  btn-default' name = 'add'><span class = 'glyphicon glyphicon-plus'></span></button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class = 'col-md-6'>
                <form action = 'processPendingStocks.php' method = 'POST'>
                  <input name = 'symbol' value = '" . $row[2] . "' hidden/>
                  <button type = 'submit' class='btn  btn-default' name = 'purchase'>Purchase</button>
                </form>
              </div>
              <div class = 'col-md-6'>
                <form  action = 'processPendingStocks.php' method = 'POST'>
                  <input name = 'symbol' value = '" . $row[2] . "' hidden/>
                  <button type = 'submit' class='btn  btn-default' name = 'cancel'>Cancel</button>
                </form>
              </div>
            </div>
          </div>";
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
