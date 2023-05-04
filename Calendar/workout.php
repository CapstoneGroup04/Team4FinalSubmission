<?php
    if(!session_start()) {
      header("Location: index.php");
      exit;
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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
  <title>Workout Tracker - Workout Calendar</title>
  <link href="./Bootstrap/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link rel="stylesheet" href="calendarstyle.css">
  <link rel="stylesheet" href="jquery-ui.min.css">
  <script src="jquery-ui.min.js"></script>

  
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
              <li id="ACTIVE"><a href="../index.php">Home</a></li>
              <li><a href="../Calories/Calories.php">Calories</a></li>
              <li><a href="../Calendar/workout.php">Workout</a></li>
              <li><a href="../Mindfulness/mindfulness.php">Mindfullness</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <!--NAVBAR END-->
    
    <div class="account-button">
      <a href="../Account/account.php"><img src="../setting.png" class="size"></a>
    </div>

    <div class="welcome">
      <h1>Track your Progress!</h1>
    </div>
    <div id="workout-form-container">
      <h2>Log Your Workout!</h2>

      
      <script>
        function getDate(){

        }
      </script>

      <form id="workout-form" action = "workout_form.php" method = "POST">
        <label for="date">Date:</label>
        <input type="text" class="form-control" id="date_wrkt" name ="date_wrkt" placeholder = "YYYY-MM-DD">
        <label for="workout-type">Workout Type:</label>
        <input type="text" class="form-control" id="type_wrkt" name="type_wrkt" required>

        <label for="calories-burned">Calories Burned:</label>
        <input type="number" class="form-control" id="burned" name="burned" required>

        <label for="notes">Notes:</label>
        <input id="notes" class="form-control" id ="notes"name="notes"></textarea>
  

        <button type="submit" value = "submit" id="submit-workout" onclick = "">Save</button>
        
      </form>
  </div>
    
      </div>
    </div>
 
  <div id="calendar">
  <h1>Workout Log</h1>
        <table style = "width: 100%">
            <tr>
                <th>Date of Workout</th>
                <th>Type of Workout</th>
                <th>Calories Burned</th>
                <th>Notes</th>
            </tr>
            <!--<form name="nicksForm" action="updateWorkout.php" method="POST">
            
            <input type="hidden" name="action" value="do_update"> -->

            <?php
                  
                  // Require the credentials
                  require_once '../db.conf';

                    // Connect to the database
                  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

                    // Check for errors
                  if ($mysqli->connect_error) {
                      $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                      require "../indexLoggedIn.php";
                      exit;
                  }
                  $query = "SELECT * from workout where username='$loggedIn';";
                      
                  $mysqliResult = mysqli_query($mysqli, $query);
                  while($row = mysqli_fetch_array($mysqliResult)){
                    $a = $row[1];
                    $b = $row[2];
                    $c = $row[3];
                    $d = $row[4];
                    print "<tr>";
                    print "<td>$a</td>";
                    print "<td>$b</td>";
                    print "<td>$c</td>";
                    print "<td>$d</td>";
                    print "</tr>";
                  }

                  $mysqliResult->close();
                  $mysqli->close();
    
            /*
                <li class="ToDoListItem task">Cardio</li>
                <li class="ToDoListItem task">Weights</li>
                <li class="ToDoListItem task">Take protien shake</li>
                <li class="ToDoListItem task">Get groceries</li> */

                ?>
            </tr>
        <!--</table><button type="submit" value="submit">Submit Info</a></button><br><br><br></form>-->
  </div>

  </script>
  <script src="moment.js"></script>
    
    <div class="logo-container">
      <img src="mentalthetics_logo.png" alt="Logo" class="logo">
    </div>
</body>
</html>