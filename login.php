<?php
    //error_reporting(-1);
    //ini_set('display_errors', 'On');

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: index.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	//$error = getFile();
	//require 'index.php';
	//exit;
	
	if ($loggedIn) {
		header("Location: ./index.php");
        require 'index.php';
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	}
    else {
		login_form();
	}

	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];

        if($username == '') {
            $error = 'Error: must provide username';
            require "index.php";
            exit;
        }

        if($password == '' ) {
            $error = 'Error: must provide password';
            require "index.php";
            exit;
        }
        
		//BEGIN SQL QUERY
		
        // Require the credentials
        require_once './db.conf';
        
        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
        
        // Check for errors
        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "index.php";
            exit;
        }
        
        // http://php.net/manual/en/mysqli.real-escape-string.php
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        //more secure password storing for website
        $password = sha1($password); 
        
        // Build query
		$query = "SELECT username, pswd FROM settings WHERE username = '$username' AND pswd = '$password';";
        // Sometimes it's nice to print the query. That way you know what SQL you're working with.
        //print $query;
        //exit;
        
		// Run the query with returned ID
		//$mysqliResult = $mysqli->query($query);
        $mysqliResult = mysqli_query($mysqli, $query);

        //Store table values in variables
        $row = mysqli_fetch_array($mysqliResult);
        $username = $row[0];
        $password = $row[1];

        // If there was a result...
        if ($mysqliResult) {
            // How many records were returned?
            $match = $mysqliResult->num_rows;

            // Close the results
            $mysqliResult->close();
            // Close the DB connection
            $mysqli->close();


            // If there was a match, login
  		    if ($match == 1) {
                $_SESSION['loggedin'] = $username;
                //$_SESSION['lastname'] = $lastname; //varialbes from table stored into session varialbes


                header("Location: ./index.php");
                exit;
            }
            else {
                $error = 'Error: Incorrect username or password';
                require "index.php";
                exit;
            }
        }
        // Else, there was no result
        else {
          $error = 'Login Error: Please contact the system administrator.';
          require "index.php";
          exit;
        }

		// if($username == 'User'){
		// 	$_SESSION['loggedin'] = $username;
		// 	header("Location: ../index.php");
        // 	exit;
		// }
		// else{
		// 	$error = 'You do not have an account';
		// 	require "index.php";
		// 	exit;
		// }
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "index.php";
        exit;
	}
	
?>