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
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-core.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="../Bootstrap/bootstrap.min.js"></script>

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
    <!--NAVBAR START
	
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
				<li><a href="index.html">Home</a></li>
				<li></li><a href="./Calories/Calories.html">Calories</a></li>
				<li></li><a href="./Calendar/workout.html">Workout</a></li>
				<li></li><a href="./Mindfulness/mindfulness.html">Mindfullness</a></li>
			</ul>
        </div>
      </div>
    </nav>
	NAVBAR END-->

	<!--
	<div class="account-button">
		<a href="./Account/account.php"><img src="./setting.png" class="size"></a>
	  </div>

	-->
    <div class="container">

      <div class="starter-template">
        <h1>Welcome to Mentalthetics!</h1>
		<img id="logo" src="mentalthetics_logo.png" alt="logo">
      </div>
	  

    </div><!-- /.container -->

    <div class="container">
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a id="login-form-link">Login</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
					
						<div class="row">
						<?php
					if ($error) {
						print "<div class='h6 fw-normal text-danger'>$error</div>\n";
					}
				?>

<?php
					if ($loggedIn) {
						print "<div class='h6 fw-normal text-danger'>Hello, $loggedIn!</div>\n";
					}
				?>
							<div class="col-lg-12">
								<form id="login-form" action="login.php" method="POST" role="form" style="display: block;">
								<input type="hidden" name="action" value="do_login">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<p class="mt-2 mb- text-light">Don't have an account? <a href="createUser_form.php">Click Here</a></p>
													<p class="mt-2 mb- text-light"><a href="logout.php">Logout</a></p>
												</div>
											</div>
										</div>
									</div>
								</form>
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
