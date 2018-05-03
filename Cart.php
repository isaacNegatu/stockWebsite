<?php session_start();?>

<html>
<head>
  <?php include 'includes/Links/mainLinks.php'?>
  <?php include 'includes/Links/cartLinks.php'?>
</head>
<body>

  <?php include 'includes/HTMLcontents/header.php'?>

  <div class = "container">
    <div class = "row">
      <?php include 'includes/HTMLcontents/navigationAfterLogin.php'; ?>
    </div>
    <div class= "row">

      <div class = "col-md-8">
        <div class = "row">
          <div class = "col-md-12">
             <tbody>
               <?php include 'includes/HTMLcontents/pendingStocksCart.php'?>
             </tbody>
           </table>
         </div>
        </div>


	    <?php include 'includes/HTMLcontents/footer.php'?>

	  </div>

      <?php  include 'includes/HTMLcontents/rightSideWidget.php'?>

    </div>
  </div>


</body>
</html>
