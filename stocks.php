<?php
  session_start();

 ?>
<html>
<head>
  <?php include 'includes/Links/mainLinks.php'?>
  <?php include 'includes/Links/stockLinks.php'?>
</head>
<body>

  <?php include 'includes/HTMLcontents/header.php'?>

  <div class = "container">
    <div class = "row">
      <?php
        if(isset($_SESSION['User'])){
          include 'includes/HTMLcontents/navigationAfterLogin.php';
        }else{
          include 'includes/HTMLcontents/navigationBeforeLogin.php';
        }
      ?>
    </div>
    <div class= "row">

      <div class = "col-md-8">
        <div id = "charts">

        </div>
				<?php include 'includes/HTMLcontents/footer.php'?>
			</div>




      <?php
      if(isset($_SESSION['User'])){
        include 'includes/HTMLcontents/stockSideBar.php';
      }
      ?>

    </div>
  </div>


</body>
</html>
