<!--Account Main Page-->
<!--Links for Settings and Medical Information-->
<?php
    if (!isset($_SESSION)) {
      // no session has been started yet
      session_start();
    }
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

  if($loggedIn){

  }
  else{
    header("Location: ../index.php");
  }
  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-core.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="../Bootstrap/bootstrap.min.js"></script>
       
        <link rel= "stylesheet" href="../index.css">
        <link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css.map">
        <link rel="stylesheet" href="../standard.css">
        <link rel="stylesheet" href= "account.css"> 
    </head>
    <body>
        <nav class="navbar navbar-expand-lg  navbar-inverse NAVBAR">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
              
                  <div id="navbar" class="collapse navbar-collapse NAVBAR-INNER">
                    <ul class="nav navbar-nav">
                      <li id="ACTIVE"><a href="../index.php">Home</a></li>
                      <li><a href="../Calories/Calories.php">Calories</a></li>
                      <li><a href="../Calendar/workout.php">Workout</a></li>
                      <li><a href="../Mindfulness/mindfulness.php">Mindfullness</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div>
              </nav>
              <div class="account-button">
                <a href="../Account/account.php"><img src="../setting.png" class="size"></a>
              </div>
              <div class="welcome">
        <h1 style="color:#666">View Your Account</h1>
        </div>
        <button type = "button" style = "width: 20%" onclick = "window.location.href = 'medicalInfo.php';" target="_self">Medical Information</button>
        <button type = "button" style = "width: 20%" onclick = "window.location.href = '../logout.php';" target="_self">Log Out</button>
        <div class="logo-container">
          <img src="mentalthetics_logo.png" alt="Logo" class="logo">
        </div>
    </body>
</html>