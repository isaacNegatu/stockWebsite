<?php

  include "lib/CartDB.class.php";

?>

<div class = "stick">
	<div class = "col-md-4 well">
    <?php


    foreach($_POST as $key=>$value)
    {
      echo "$key=$value";
    }

      if(isset($_POST['stock'])){
        $currentStock = strtolower($_SESSION['stock']);

        $url = "https://api.iextrading.com/1.0/stock/" . $currentStock . "/quote?displayPercent=true";

        echo $url;

        $stockJSON = json_decode($url);

        echo $stockJSON;
        try{
          $DBcart = new CartDB($pdo);

        }catch (PDOException $e){
          die($e->getMessage());
          //displayError();
        }
      }


     ?>
	</div>
</div>
