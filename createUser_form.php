<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blockchain Busters</title>

    <!-- Bootstrap core CSS -->
    <link href="./Bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./standard.css" rel="stylesheet"> 
    <link href="./index.css" rel="stylesheet">
    <script>
        $(function(){
            $("input[type=submit]").button();			
        
        });
    </script>
    <style>
        #loginWidget {
            padding: 5px;
            background-color: #fff;
            max-width: 600px; 
            margin: auto;
            border-color: #ccc;
	        -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	        -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	        box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2); 
        }


    </style>

</head>
<body>
    <div id="loginWidget" class="ui-widget">
        <h1 class="h2 mb-3 fw-normal text-light">Create your Account</h1>
        
        <?php
            if ($error) {
                print "<div class='h6 mb-3 fw-normal text-danger'>$error</div>\n";
            }
        ?>

        <form name="nicksForm" action="createUser.php" method="POST" >
            
            <input type="hidden" name="action" value="do_create">

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="confirmPass">Confirm Password:</label>
                <input type="password" id="confirmPass" name="confirmPass" class="form-control">
            </div>

            <div class="form-group">
                <label for="firstName">Firstname:</label>
                <input type="text" id="firstName" name="firstName" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="lastName">Lastname:</label>
                <input type="text" id="lastName" name="lastName" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            
            <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" value="submit">Create Account</button>
        </form>
    </div>
</body>
</html>
