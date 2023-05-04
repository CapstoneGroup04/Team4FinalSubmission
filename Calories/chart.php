<?php
$error = '';
if($error){
    print "<div class= 'h6 fw-normal text-danger'>$error</div>\n";
}
setcookie(name, value, time() + (86400 * 30), "/");
header("Location: Calories.php");

if(!isset($_COOKIE['name'])) {
    echo "Cookies are not enabled on your browser, please turn them on!";
}

error_reporting(-1);
ini_set('display_errors', 'On');

if(!session_start()) {
    // If the session couldn't start, present an error
    header("Location: ./Mindfulness/mindfulness.html");
    exit;
}
// Step 1: Create a connection to your database
require_once '../db.conf';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

if ($mysqli->connect_error) {
    $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
    require "Calories.php";
    exit;
}

$query = "SELECT day, calories FROM calorie WHERE username = '$username'";
    
$result = $mysqli->query($query);
if (!$result){
    echo "Error" . $mysqli->error;
    exit;
}

$data = array();
for ($x = 0; $x < mysql_num_rows($query); $x++) {
    $data[] = mysql_fetch_assoc($query);
}
echo json_encode($data);

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


$mysqli->close();
?>
