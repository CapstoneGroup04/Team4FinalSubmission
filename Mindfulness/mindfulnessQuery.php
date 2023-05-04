<?php
    //error_reporting(-1);
    //ini_set('display_errors', 'On');

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if (!$loggedIn) {
		header("Location: ../index.php");
		exit;
	}
	
	handle_creation();
	
	function handle_creation() {

        $task = empty($_POST['task']) ? '' : $_POST['task'];
        $action = empty($_POST['action']) ? '' : $_POST['action'];
        $username = empty($_POST['username']) ? '' : $_POST['username'];

        if($confirmPass == '' ) {
            $error = 'Error: enter a task.';
            require "mindfulness.php";
            exit;
        }

        if(true){
           // Require the credentials
            require_once '../db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "mindfulness.php";
                exit;
            }
            
            if($action == 'addTask'){
        
                // Build query
                $query = "INSERT INTO mindfulness(username, todo_list) VALUES ('$username', '$task');";           
                $mysqliResult = mysqli_query($mysqli, $query);

                if($mysqliResult){
                    //$mysqliResult->close();
                    $mysqli->close();
                    header("Location: ../Mindfulness/mindfulness.php");
                    exit;
                }
                else {
                    // Close the results
                    //$mysqliResult->close();
                    // Close the DB connection
                    $mysqli->close();
                    $error = 'Error: Could not add to database';
                    require "./mindfulness.php";
                    exit;
                }
	        }

            if($action == "rmTask"){
                $query = "DELETE FROM mindfulness WHERE username='$username' AND todo_list='$task';";
                $mysqliResult = mysqli_query($mysqli, $query);
                $mysqli->close();
                header("Location: ../Mindfulness/mindfulness.php");
            }
        }
    }
?>