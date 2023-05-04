<?php
    if (!isset($_SESSION)) {
      // no session has been started yet
      session_start();
    }
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

  if(!$loggedIn){
    header("Location: ../index.php");
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="mindfulness.css">
    <title>Mindfulness</title>
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
                      <li ><a href="../index.php">Home</a></li>
                      <li><a href="../Calories/Calories.php">Calories</a></li>
                      <li><a href="../Calendar/workout.php">Workout</a></li>
                      <li id="ACTIVE"><a href="../Mindfulness/mindfulness.php">Mindfullness</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div>
              </nav>
              <div class="account-button">
                <a href="../Account/account.php"><img src="../setting.png" class="size"></a>
              </div>
              <?php
					if ($error) {
						print "<div class='h6 fw-normal text-danger'>$error</div>\n";
					}
				?>
    <div id="mindfulness" class="tabcontent" style="display: block;">
      <div id="myDIV" class="header">
                <h2>My To-Do List</h2>
                <form action="mindfulnessQuery.php" method="POST">
                <input type="hidden" name="action" value="addTask">
                <input type="hidden" name="username" value="<?php print $loggedIn?>">
                <input type="text" id="myInput" name="task" placeholder="Add a Task...">
                <button class="addBtn" type="submit" value="Add">Add</button>
                </form>
            </div>
            <ul id="myUL">
              <?php
                  
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
                  $query = "SELECT todo_list FROM mindfulness WHERE username = '$loggedIn';";
                      
                  $mysqliResult = mysqli_query($mysqli, $query);
                  while($row = mysqli_fetch_array($mysqliResult)){
                    $test = $row[0];
                    print "<form action='mindfulnessQuery.php' method='POST'><input type='hidden' name='username' value=" . $loggedIn . "><input type='hidden' name='action' value='rmTask'><input type='hidden' name='task' value='" . $test . "'><li class='ToDoListItem task'>". $row[0] ."<button class='rmBtn' type='submit' value='Remove'>Remove</button></li></form>";
                  }

                  $mysqliResult->close();
                  $mysqli->close();
    
            /*
                <li class="ToDoListItem task">Cardio</li>
                <li class="ToDoListItem task">Weights</li>
                <li class="ToDoListItem task">Take protien shake</li>
                <li class="ToDoListItem task">Get groceries</li> */

                ?>
            </ul>

            <!-- Create a div to hold the quotes -->
            <div id="quote-container"></div>
            <script>
                //Define an array of quotes
                var quotes = [
                    "The only bad workout is the one that didn't happen. - Tito Opawole",
			        "The difference between try and triumph is just a little umph! - Marvin Phillips",
			        "In the end, we will remember not the words of our enemies, but the silence of our friends. - Martin Luther King Jr.",
			        "Success is not final, failure is not fatal: it is the courage to continue that counts. - Winston Churchill",
			        "Believe in yourself and all that you are. Know that there is something inside you that is greater than any obstacle. - Christian D. Larson"
                ];

                // Set a variable to keep track of the current quote index
		        var currentIndex = 0;

                // Define a function to display the next quote
		        function displayQuote(){
                    //Get the quote container element
                    var quoteContainer = document.getElementById("quote-container");

                    //Display the current quote in italics
                    quoteContainer.innerHTML = "<p>" + quotes[currentIndex] + "</p>";

                    //Increment the current index, wrapping around to the begining if necessary
                    currentIndex = (currentIndex + 1) % quotes.length;
                }

                //Call the displayQuote function initially
                displayQuote();

                // Set an interval to display the next quote every 5 seconds
		        setInterval(displayQuote, 10000);

                /*
                var myNodelist = document.getElementsByClassName("ToDoListItem");
                var i;
                for (i = 0 ;i < myNodelist.length; i++){
                    var span = document.createElement("SPAN");
                    var txt = document.createTextNode("\u00D7");
                    span.className = "close";
                    span.appendChild(txt);
                    myNodelist[i].appendChild(span);

                } */

                /*
                var close = document.getElementsByClassName("close");
                var i;
                for (i = 0; i < close.length; i++){
                    close[i].onclick = function(){
                        var div = this.parentElement;
                        div.style.display = "none";
                    }
                } */

                //Add a "checked" symbol when clicking on a list item
                var list = document.querySelector('#myUL');
                list.addEventListener('click', function(ev){
                    if (ev.target.class === 'task'){
                        ev.target.classList.toggle('checked');
                    }
                }, false);

                //Create a new list item when clicking on the "add" button
                function newElement(){
                    var li = document.createElement("li");
                    var inputValue = document.getElementById("myInput").value;
                    var t = document.createTextNode(inputValue);
                    li.appendChild(t);
                    if (inputValue === ''){
                        alert("you must write something!");
                    } else{
                        document.getElementById("myUL").appendChild(li);
                    }
                    document.getElementById("myInput").value = "";

                    var span = document.createElement("SPAN");
                    var txt = document.createTextNode("\u00D7");
                    span.className = "close";
                    span.appendChild(txt);
                    li.appendChild(span);

                    for (i = 0; i < close.length; i++){
                        close[i].onclick = function() {
                            var div = this.parentElement;
                            div.style.display = "none";
                        }
                    }
                }
            </script>
    </div>

    <div id="home" class="tabcontent">
      <h3>Meditation</h3>
      <p>Meditation is a practice where an individual uses a technique – such as mindfulness, or focusing the mind on a particular object, thought, or activity – to train attention and awareness, and achieve a mentally clear and emotionally calm and stable state.</p>
    </div>

    <div id="calorie" class="tabcontent">
      <h3>Yoga</h3>
      <p>Yoga is a group of physical, mental, and spiritual practices or disciplines that originated in ancient India. It includes postures (asanas), breathing techniques (pranayama), and meditation (dyana).</p>
    </div>

    <div id="workout" class="tabcontent">
        <h3>Yoga</h3>
        <p>Yoga is a group of physical, mental, and spiritual practices or disciplines that originated in ancient India. It includes postures (asanas), breathing techniques (pranayama), and meditation (dyana).</p>
    </div>

    <div id="account" class="tabcontent">
        <h3>Meditation</h3>
        <p>Meditation is a practice where an individual uses a technique – such as mindfulness, or focusing the mind on a particular object, thought, or activity – to train attention and awareness, and achieve a mentally clear and emotionally calm and stable state.</p>
    </div>

    <script>
      function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName('tabcontent');
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = 'none';
        }
        tablinks = document.getElementsByClassName('tablinks');
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(' active', '');
        }
        document.getElementById(tabName).style.display = 'block';
        evt.currentTarget.className += ' active';
      }
    </script>
      <div class="logo-container">
        <img src="../mentalthetics_logo.png" alt="Logo" class="logo">
      </div>
  </body>
</html>