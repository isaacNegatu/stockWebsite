<?php session_start();?>

<html>
<head>
  <?php include 'includes/Links/mainLinks.php'?>
  <?php include 'includes/Links/portfolioLinks.php'?>
</head>
<body>

  <?php include 'includes/HTMLcontents/header.php'?>

  <div class = "container">
    <div class = "row">
      <?php
        include 'includes/HTMLcontents/navigationAfterLogin.php';
      ?>
    </div>
    <div class= "row">

      <div class = "col-md-8">

        <ul class="nav nav-tabs">
          <li class="active tabs" ><a data-toggle="tab" href="#pending">Pending Stocks</a></li>
          <li class = "tabs"><a data-toggle="tab" href="#owned">Owned Stocks</a></li>
        </ul>

        <div class="tab-content">
          <div id="pending" class="tab-pane fade in active">
            <div class = "row">
              <div class = "col-md-12">
                 <tbody>
                     <?php include 'includes/HTMLcontents/pendingStocks.php'?>
                 </tbody>
               </table>
             </div>

            </div>
            </br> <a href = 'Cart.php'><button class = 'btn btn-success'> View In Cart </button></a>
          </div>
          <div id="owned" class="tab-pane fade">
            <div class = "col-md-12">
            </br>
               <tbody>
                   <?php include 'includes/HTMLcontents/ownedStocks.php'?>
               </tbody>
             </table>
           </div>
          </div>
        </div>


				<?php include 'includes/HTMLcontents/footer.php'?>
			</div>
      <?php  include 'includes/HTMLcontents/rightSideWidget.php'?>

    </div>
  </div>


</body>
</html>
