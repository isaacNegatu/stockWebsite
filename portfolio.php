<?php session_start();?>

<html>
<head>
  <?php include 'includes/Links/mainLinks.php'?>
  <?php include 'includes/Links/indexLinks.php'?>
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
        <table class="table table-striped">
         <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">First</th>
             <th scope="col">Last</th>
             <th scope="col">Handle</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <th scope="row">1</th>
             <td>Mark</td>
             <td>Otto</td>
             <td>@mdo</td>
           </tr>
           <tr>
             <th scope="row">2</th>
             <td>Jacob</td>
             <td>Thornton</td>
             <td>@fat</td>
           </tr>
           <tr>
             <th scope="row">3</th>
             <td>Larry</td>
             <td>the Bird</td>
             <td>@twitter</td>
           </tr>
         </tbody>
       </table>
				<?php include 'includes/HTMLcontents/footer.php'?>
			</div>
      <?php  include 'includes/HTMLcontents/rightSideWidget.php'?>

    </div>
  </div>


</body>
</html>
