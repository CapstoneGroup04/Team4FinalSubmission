<?php 
$error = '';
if($error){
    print "<div class= 'h6 fw-normal text-danger'>$error</div>\n";
}  
require_once '../db.conf';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

if ($mysqli->connect_error) {
    $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
    require "Calories.php";
    exit;
}
            
$query = "SELECT day, calories FROM calorie";

$result = $mysqli->query($query);
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
//free memory associated with result

//close connection
$mysqli->close();

//now print the data
echo json_encode($data);

?>        