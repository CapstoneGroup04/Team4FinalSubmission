<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');

    if (!isset($_SESSION)) {
        // no session has been started yet
        session_start();
      }
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
    
    if($loggedIn == false){
        header("Location: ../index.php");
    }
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_update') {
		handle_creation();
	} else {
		login_form();
	}
	
	function handle_creation() {
        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
        $lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
        $dob = empty($_POST['dob']) ? '' : $_POST['dob'];
        $bloodType =empty($_POST['bloodType']) ? '' : $_POST['bloodType'];
        $docFirstName = empty($_POST['docFirstName']) ? '' : $_POST['docFirstName'];
        $docLastName = empty($_POST['docLastName']) ? '' : $_POST['docLastName'];
        $docType = empty($_POST['docType']) ? '' : $_POST['docType'];
        $insurance = empty($_POST['insurance']) ? '' : $_POST['insurance'];

        if(true){
           // Require the credentials
            require_once '../db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "medicalInfo.php";
                exit;
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
            $firstName = $mysqli->real_escape_string($firstName);
            $lastName = $mysqli->real_escape_string($lastName);
            $dob = $mysqli->real_escape_string($dob);
            $bloodType = $mysqli->real_escape_string($bloodType);
            $docFirstName = $mysqli->real_escape_string($docFirstName);
            $docLastName = $mysqli->real_escape_string($docLastName);
            $docType = $mysqli->real_escape_string($docType);
            $insurance = $mysqli->real_escape_string($insurance);

            // Build query                    //add email, birthday, firtname, lastname to query if added to table
            $query = "UPDATE med_info SET pat_first='$firstName', pat_last='$lastName', pat_dob='$dob', blood_type='$bloodType', doc_first='$docFirstName', doc_last='$docLastName', doc_type='$docType', insurance='$insurance' WHERE username='$username';";

            //TO FIX ---- Creates users and displays error messages fine, but when another user already exists, page crashes. Do not know why.
            $mysqliResult = $mysqli->query($query);

            if($mysqliResult == TRUE){
                $mysqli->close();
                $_SESSION['loggedin'] = $username;
                header("Location: ./medicalInfo.php");
                exit;
            }
            else {
                // Close the results
                $mysqliResult->close();
                // Close the DB connection
                $mysqli->close();

                $error = 'Error: This user already exists.';
                require "medicalInfo.php";
                exit;
            }
        }    
        else {
                // Close the results
                $mysqliResult->close();
                // Close the DB connection
                $mysqli->close();

            $error = 'Login Error: Please contact the system administrator.';
            require "medicalInfo.php";
            exit;
        }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "../index.php";
        exit;
	}
	
?>