<?php
    if(!session_start()) {
        header("Location: error.php");
        exit;
    }
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="./Bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="standard.css" rel="stylesheet"> 
    <link href="index.css" rel="stylesheet">
    <script src="index.js"></script>
	<script>
      $(function(){
          $("input[type=submit]").button();
      });
    </script>

  </head>

  <body>
    <!--NAVBAR START-->
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
				<li><a href="index.php">Home</a></li>
				<li></li><a href="./Calories/Calories.php">Calories</a></li>
				<li></li><a href="./Calendar/workout.php">Workout</a></li>
				<li></li><a href="./Mindfulness/mindfulness.php">Mindfullness</a></li>
			  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<!--NAVBAR END-->
	<div class="account-button">
		<a href="./Account/account.php"><img src="./setting.png" class="size"></a>
	  </div>
    <div class="container" class="welcome" style="margin-top:-40px">
      <div class="starter-template">
        <h1 style="color:#666">Welcome to Mentalthetics!</h1>
		<img id="logo" src="mentalthetics_logo.png" alt="logo">
      </div>
	  

    </div><!-- /.container -->

	

    <div class="container">
	<?php
		if ($loggedIn) {
		print "<h3 style='color:#666';>Hello, $loggedIn!</div>\n";
		}
	?>
    	<div class="row">
			<div class="col-lg-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a id="login-form-link">Our Mission</a>
							</div>
							<div class="col-xs-6">
								<a id="login-form-link">How to Use our App</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
						<div class="col-lg-6">
						     Our mission is to help individuals achieve their health goals while also being a space to safely keep their important medical information. Our app was designed by passionate health enthusiasts that are motivated to provide an easy fitness goal-tracking experience. If you have any advice on how to improve this user experience, please contact the development team. 
						</div>
						<div class="col-lg-6">
							<ul>
								<li><h5>Calories - </h5>Use this page to track daily macros and calories</li>
								<li><h5>Workout - </h5>Use this page to track your daily workouts</li>
								<li><h5>Mindfullness - </h5>Use this page to track your daily tasks</li>
								<li><h5>Account - </h5>Use this page to update your medical information and sign out</li>
							</ul>
						</div>


				
				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="./Bootstrap/bootstrap.min.js"></script>
	<div class="logo-container">
		<img src="mentalthetics_logo.png" alt="Logo" class="logo">
	  </div>
	  
  </body>
</html>
