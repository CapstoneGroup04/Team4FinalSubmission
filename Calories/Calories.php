<!DOCTYPE html>
<html>
  <head>
    <title>Calories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="../Bootstrap/bootstrap.min.js"></script>
    <link rel= "stylesheet" href= "calories.css">
    <link rel= "stylesheet" href="../index.css">
    <link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css.map">
    <link rel="stylesheet" href="../standard.css">
    <script src="../index.js"></script>   
  </head>
  <body>
  <?php 
    $error = '';
    if($error){
        print "<div class= 'h6 fw-normal text-danger'>$error</div>\n";
    }  
    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

    if(!$loggedIn == false){
        header("Location: ../index.php");
    }

    require_once '../db.conf';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
            
    $query = $mysqli->query("SELECT * FROM calorie ");

    foreach($query as $data)
    {
        $day[] = $data['day'];
        $calories[] = $data['calories'];
        $fats[] = $data['fats'];
        $carbs[] = $data['carbs'];
        $proteins[] = $data['proteins'];
        $water[] = $data['water'];
    }
    //close connection
    $mysqli->close();
 ?>       
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
                    <li><a href="../index.php">Home</a></li>
                    <li></li><a href="../Calories/Calories.php">Calories</a></li>
                    <li></li><a href="../Calendar/workout.php">Workout</a></li>
                    <li></li><a href="../Mindfulness/mindfulness.php">Mindfullness</a></li>
                  </ul>
            </div><!--/.nav-collapse -->
            <div class="account-button">
                <a href="../Account/account.html"><img src="../setting.png" class="size"></a>
              </div>
          </div>
        </nav>
        <div class="welcome">
              <h1>Track your calories!</h1>
            </div>
          </div>
          <div class= "form">
            <form action = "nutritionData.php" method="POST">
            <label for="newDay">Day:</label>
            <input type="text" class="form-control" id="day" name="day"><br>
                
            <label for="newCalories">New Calories:</label>
            <input type="text" class="form-control" id="calories" name="calories"><br>

            <label for="Fat">Fat</label>
            <input type="number" class="form-control" id="fats" name="fats"><br>

            <label for="Carbs">Carbs</label>
            <input type="number" class="form-control" id="carbs" name="carbs"><br>

            <label for="Protein">Protein</label>
            <input type="number" class="form-control" id="proteins" name="proteins"><br>

            <label for="Water">Water</label>
            <input type="number" class="form-control" id="water" name="water"><br>
                
            <button type="submit" value = "submit" class="form-control">Add Data</button>
            </form>
        </div>
      <div id = "container">
        <canvas id= "Chart"></canvas>
        <script>
        function calorieData(){
            const labels = <?php echo json_encode($day) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Calories',
                    data: <?php echo json_encode($calories) ?>,
                    backgroundColor: [
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)'
                    ],
                    borderColor: [
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('Chart'),
                config
            );
            console.log(data);
        }
        function fatData(){
            const labels = <?php echo json_encode($day) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Fats',
                    data: <?php echo json_encode($fats) ?>,
                    backgroundColor: [
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)'
                    ],
                    borderColor: [
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('Chart'),
                config
            );
            console.log(data);
            
        }
        function proteinData(){
            const labels = <?php echo json_encode($day) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Proteins',
                    data: <?php echo json_encode($proteins) ?>,
                    backgroundColor: [
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)'
                    ],
                    borderColor: [
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('Chart'),
                config
            );
            console.log(data);
            
        }
        function carbData(){
            const labels = <?php echo json_encode($day) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Carbs',
                    data: <?php echo json_encode($carbs) ?>,
                    backgroundColor: [
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)'
                    ],
                    borderColor: [
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('Chart'),
                config
            );
            console.log(data);
            
        }
        function waterData(){
            const labels = <?php echo json_encode($day) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Water',
                    data: <?php echo json_encode($water) ?>,
                    backgroundColor: [
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)',
                        'rgba(128, 128, 128, 0.2)'
                    ],
                    borderColor: [
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)',
                        'rgb(128, 128, 128)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('Chart'),
                config
            );
            console.log(data);
            
        }
        function removeChart() {
            var canvas = document.getElementById('Chart');
            canvas.remove();
        }
        function createCanvas(calorieChart) {
            // Create the canvas element
            var canvas = document.createElement('canvas');
            
            canvas.setAttribute('id', 'Chart')
  
            // Get the container div
            var container = document.getElementById('container');
  
            // Append the canvas element to the container div
            container.appendChild(canvas);
        }
        </script>
      </div>
        <div id="buttons" class="form">
            <button class="btn btn-primary btn-rounded" onclick="removeChart();createCanvas();calorieData();">Calories</button>
            <button class="btn btn-primary btn-rounded" onclick= "removeChart();createCanvas();fatData();">Fat</button>
            <button class="btn btn-primary btn-rounded" onclick= "removeChart();createCanvas();carbData();">Carbs</button>
            <button class="btn btn-primary btn-rounded" onclick= "removeChart();createCanvas();proteinData();">Protein</button>
            <button class="btn btn-primary btn-rounded" onclick= "removeChart();createCanvas();waterData();">Water</button>
        </div>  
        <div class="logo-container">
            <img src="mentalthetics_logo.png" alt="Logo" class="logo">
          </div>
              
    </body>
</html>
