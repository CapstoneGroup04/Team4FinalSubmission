<?php
$error = '';
if($error){
    print "<div class= 'h6 fw-normal text-danger'>$error</div>\n";
}


error_reporting(-1);
ini_set('display_errors', 'On');

if(!session_start()) {
    // If the session couldn't start, present an error
    header("Location: ../Calories.php");
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
    require "Calories.php";
    exit;
}

// Step 2: Check if the user has submitted the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 3: Extract the form data
    $day = $_POST["day"];
    $calories = $_POST["calories"];
    $fats = $_POST["fats"];
    $carbs = $_POST["carbs"];
    $proteins = $_POST["proteins"];
    $water = $_POST["water"];

    //required fields
    if($day == '' ) {
        $error = 'Error: must provide day';
        require "Calories.php";
        exit;
    }

    if($calories == '' ) {
        $error = 'Error: must provide calorie data';
        require "Calories.php";
        exit;
    }

    if($carbs == '' ) {
        $error = 'Error: must provide carb data';
        require "Calories.php";
        exit;
    }

    if($proteins == '' ) {
        $error = 'Error: must provide protein data';
        require "Calories.php";
        exit;
    }

    if($fats == '' ) {
        $error = 'Error: must provide fat data';
        require "Calories.php";
        exit;
    }

    if($water == '' ) {
        $error = 'Error: must provide water data';
        require "Calories.php";
        exit;
    }

    // Step 4: Sanitize and validate the form data
    $day = mysqli_real_escape_string($mysqli, $day);
    $calories = mysqli_real_escape_string($mysqli, $calories);
    $fats = mysqli_real_escape_string($mysqli, $fats);
    $carbs = mysqli_real_escape_string($mysqli, $carbs);
    $proteins = mysqli_real_escape_string($mysqli, $proteins);
    $water = mysqli_real_escape_string($mysqli, $water);

    // Step 5: Construct an SQL query to insert the form data
    $query = "INSERT INTO calorie (username, day, calories, fats, carbs, proteins, water)
            VALUES ('$loggedIn', '$day', '$calories', '$fats', '$carbs', '$proteins', '$water')";

    // Step 6: Execute the SQL query
    if ($mysqli->query($query) === TRUE) {
        // Step 7: Close the database connection
        $mysqli->close();

        // Step 8: Redirect the user to a new page or display a success message
        header("Location: Calories.php");
        
        
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>