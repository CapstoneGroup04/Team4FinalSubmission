<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: ../index.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		handle_creation();
	} else {
		login_form();
	}
	
	function handle_creation() {
        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
		$firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
        $lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
        $dob = empty($_POST['dob']) ? '' : $_POST['dob'];

       	
        //required fields
        if($firstName == '' ) {
            $error = 'Error: must provide first name';
            require "createUser_form.php";
            exit;
        }

        if($lastName == '' ) {
            $error = 'Error: must provide last name';
            require "createUser_form.php";
            exit;
        }

        if($username == '' ) {
            $error = 'Error: must provide a username';
            require "createUser_form.php";
            exit;
        }

        if($password == '' ) {
            $error = 'Error: must provide password';
            require "createUser_form.php";
            exit;
        }

        if($confirmPass == '' ) {
            $error = 'Error: must confirm password';
            require "createUser_form.php";
            exit;
        }

        if($email == '' ) {
            $error = 'Error: must provide email address';
            require "createUser_form.php";
            exit;
        }

        if($dob == '' ) {
            $error = 'Error: must choose your year';
            require "createUser_form.php";
            exit;
        }

        if($password != $confirmPass) {
            $error = 'Error: password does not match';
            require "createUser_form.php";
            exit;
        }
        

        if(true){
           // Require the credentials
            require_once './db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "createUser_form.php";
                exit;
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);
            $firstName = $mysqli->real_escape_string($firstName);
            $lastName = $mysqli->real_escape_string($lastName);
            $email = $mysqli->real_escape_string($email);
            $dob = $mysqli->real_escape_string($dob);

            $password = sha1($password);

            // Build query                    //add email, birthday, firtname, lastname to query if added to table
            $query = "INSERT INTO settings(username, pswd, email) VALUES ('$username', '$password', '$email');";
            $query .= "INSERT INTO med_info(username, pat_first, pat_last, pat_dob) VALUES ('$username', '$firstName', '$lastName', '$dob');"; 

            //TO FIX ---- Creates users and displays error messages fine, but when another user already exists, page crashes. Do not know why.
           

            if($mysqli->multi_query($query) == TRUE){
                $mysqli->close();
                $_SESSION['loggedin'] = $username;
                header("Location: ../index.php");
                exit;
            }
            else {
                // Close the results
                //$mysqliResult->close();
                // Close the DB connection
                $mysqli->close();

                $error = 'Error: This user already exists.';
                require "createUser_form.php";
                exit;
            }
        }    
        else {
                // Close the results
                $mysqliResult->close();
                // Close the DB connection
                $mysqli->close();

            $error = 'Login Error: Please contact the system administrator.';
            require "createUser_form.php";
            exit;
        }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "createUser_form.php";
        exit;
	}
	
?>