<?php



  include ('C:\xampp\htdocs\phpFinalProject\lib\PersonDB.class.php');
  include ('C:\xampp\htdocs\phpFinalProject\includes\stockConfig.inc.php');

 ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav navig ">
      <li>	<a href = "index.php">Home</a></li>
      <li><a href = "Stocks.php">Stocks</a></li>
      <li><a href = "Portfolio.php">Portfolio</a></li>
      <li><a href = "ContactUs.php">Contact Us</a></li>
    </ul>
    <ul class = "nav navbar-nav navbar-right">
      <li><a href = "Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      <li><a href = "Account.php"><span class = "glyphicon glyphicon-user"></span> Hello
        <?php
          try{
            $DBPerson= new PersonDB($pdo);
            $Id = $_SESSION['User'][0];
            $currentUser = $DBPerson->findById($Id);
            if($currentUser){
              echo $currentUser[2];
            }
          }catch (PDOException $e){
            die($e->getMessage());
          }
      ?>
    </a></li>
        <li><a href = "LogOut.php"><span class = "glyphicon glyphicon-log-out"></span>  Log Out</a></li>
    </ul>

  </div>
</nav>
