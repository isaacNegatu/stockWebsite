<?php
  session_start();
 ?>
<html>
<head>
  <?php include 'includes/Links/mainLinks.php'?>
  <?php include 'includes/Links/indexLinks.php'?>
</head>
<body>

  <?php include 'includes/HTMLcontents/header.php'?>

  <div class = "container">
    <div class = "row">
      <?php include 'includes/HTMLcontents/navigationBeforeLogin.php';?>
    </div>
    <div class= "row">

      <div class = "col-md-8">
				<form method = "post" id = "logIn" action = "processLogIn.php">
          <div class = "row">
            <div class = "form-group col-md-6 col-md-offset-3">
              <label for="fName">Email</label>
              <input type = "text" class = "form-control" id = "userName" placeholder="Enter Your Email" name = "userName" />
            </div>
          </div>
          <div class = "row">
            <div class = "form-group col-md-6 col-md-offset-3">
              <label for="fName">Password</label>
              <input type = "password" class = "form-control" id = "password" placeholder="Enter Your Password" name = "password" />
            </div>
          </div>
          <div class = "row">
    					<div class = "col-md-4 col-md-offset-4">
    					<br>
    					<input class="btn btn-primary btn-block" type="submit" value="Log In" id = "submitBtn">
    					</div>
    			</div>
          <?php

            if (isset($_SESSION['authFailed'])){
              echo "<div class = 'row'>
                      <div class = 'col-md- col-md-offset-5'>
                        <p>
                          Incorrect Credentials!
                        </p>
                        <p>
                          Please <a href = 'signUp.php'> Sign Up </a>.
                        </p>
                      </div>
                    </div>";
            }
          ?>
        </form>

				<?php include 'includes/HTMLcontents/footer.php'?>
			</div>
      <?php  include 'includes/HTMLcontents/rightSideWidget.php'?>

    </div>
  </div>


</body>
</html>
