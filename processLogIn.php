
<?php
  session_start();
  include "includes/stockConfig.inc.php";
  include "lib/UserDB.class.php";
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
      <?php include 'includes/HTMLcontents/navigationBeforeLogin.php'?>
    </div>
    <div class= "row">

      <div class = "col-md-8">
				<div class = "error">
          <?php
            if(isset($_POST)){
              $userName = $_POST['userName'];
              $password = $_POST['password'];
            }

            try{
              $DBuser = new UserDB($pdo);
              $currentUser = $DBuser->findByUserNameAndPassword($userName, $password);


              if($currentUser){
                $_SESSION["User"] = $currentUser;
                header("Location: index.php");
              }else{
                $_SESSION['authFailed'] = true;
                header("Location: LogIn.php");
                exit;
              }

            }catch (PDOException $e){
              die($e->getMessage());
              //displayError();
            }


          ?>
        </div>
				<?php include 'includes/HTMLcontents/footer.php'?>
			</div>
      <?php  include 'includes/HTMLcontents/rightSideWidget.php'?>

    </div>
  </div>


</body>
</html>
