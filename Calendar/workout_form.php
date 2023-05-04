<?php
$error = '';
/*if($error){
    print "<div class= 'h6 fw-normal text-danger'>$error</div>\n";
}


error_reporting(-1);
ini_set('display_errors', 'On');*/

if(!session_start()) {
    // If the session couldn't start, present an error
    header("Location: workout.php");
    exit;
}

$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

if($loggedIn == false){
    header("Location: ../index.php");
}


// Step 1: Create a connection to your database
require_once '../db.conf';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

if ($mysqli->connect_error) {
    $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
    require "workout.php";
    exit;
}

// Step 2: Check if the user has submitted the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 3: Extract the form data
    $date_wrkt = isset($_POST["date_wrkt"]) ? $_POST["date_wrkt"] : '';
    $type_wrkt = isset($_POST["type_wrkt"]) ? $_POST["type_wrkt"] : '';
    $burned = isset($_POST["burned"]) ? $_POST["burned"] : '';
    $notes = isset($_POST["notes"]) ? $_POST["notes"] : '';

    //required fields
    if($date_wrkt == '' ) {
        $error = 'Error: must provide a date';
        require "workout.php";
        exit;
    }

    if($type_wrkt == '' ) {
        $error = 'Error: must provide calorie data';
        require "workout.php";
        exit;
    }

    if($burned == '' ) {
        $error = 'Error: must provide carb data';
        require "workout.php";
        exit;
    }

    if($notes == '' ) {
        $error = 'Error: must provide protein data';
        require "workout.php";
        exit;
    }


    // Step 4: Sanitize and validate the form data
    $date_wrkt = mysqli_real_escape_string($mysqli, $date_wrkt);
    $type_wrkt = mysqli_real_escape_string($mysqli, $type_wrkt);
    $burned = mysqli_real_escape_string($mysqli, $burned);
    $notes = mysqli_real_escape_string($mysqli, $notes);
    

    // Step 5: Construct an SQL query to insert the form data
    $query = "INSERT INTO workout (username, date_wrkt, type_wrkt, burned, notes)
            VALUES ('$loggedIn', '$date_wrkt', '$type_wrkt', '$burned', '$notes')";

    // Step 6: Execute the SQL query
    if ($mysqli->query($query) === TRUE) {
        // Step 7: Close the database connection
        $mysqli->close();

        // Step 8: Redirect the user to a new page or display a success message
        header("Location: workout.php");
        
        
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>