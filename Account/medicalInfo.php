<!--Medical Information Main Page-->
<!--Insurance, Doctors, etc-->
<?php
    if (!isset($_SESSION)) {
      // no session has been started yet
      session_start();
    }
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

  if($loggedIn){
    // Require the credentials
    require_once '../db.conf';

    // Connect to the database
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

    // Check for errors
    if ($mysqli->connect_error) {
        $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        require "../index.php";
        exit;
    }

    $query = "SELECT * FROM med_info WHERE username = '$loggedIn';";
        
    $mysqliResult = mysqli_query($mysqli, $query);

    //Store table values in variables
    $row = mysqli_fetch_array($mysqliResult);
    $firstName = $row[1];
    $lastName = $row[2];
    $dob = $row[3];
    $bloodType = $row[4];
    $docFirstName = $row[5];
    $docLastName = $row[6];
    $docType = $row[7];
    $insurance = $row[8];

    $mysqliResult->close();
    $mysqli->close();
  }
  else{
    header("Location: ../index.php");
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Medical Information</title>
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
        <h1 style="color:#666">Medical Infomation</h1>
        <?php
					if ($error) {
						print "<div class='h6 fw-normal text-danger'>$error</div>\n";
					}
				?>
        <table style = "width: 100%">
            <tr>
                <th>Patient's First Name</th>
                <th>Patient's Last Name</th>
                <th>Patient's D.O.B</th>
                <th>Patient's Blood Type</th>
                <th>Doctor's First Name</th>
                <th>Doctor's Last Name</th>
                <th>Doctor Type</th>
                <th>Insurance Company</th>
            </tr>
            <tr>
            <?php
					
					  print "<td>$firstName</td>\n";
            print "<td>$lastName</td>\n";
            print "<td>$dob</td>\n";
            print "<td>$bloodType</td>\n";
            print "<td>$docFirstName</td>\n";
            print "<td>$docLastName</td>\n";
            print "<td>$docType</td>\n";
            print "<td>$insurance</td>\n";
		
				?>
            </tr>
        </table>
        <br>
        <button type="button" href><a href="./medicalForm.php">Update Info</a></button>
        <div class="logo-container">
          <img src="mentalthetics_logo.png" alt="Logo" class="logo">
        </div>
    </body>
</html>