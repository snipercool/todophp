<?php

    require_once("bootstrap.php");

	
	if ( isset($_POST['submit'])) {
		try {   
                $user = new User();
                $user->setUsername(htmlspecialchars(($_POST['username'])));        
                $user->setPassword(htmlspecialchars(($_POST['password'])));
            
                if ($user->login()) {
                    if ($_SESSION['admin'] == 1) {
                        header('location: admin.php');
                    }
                    else {
                        header('location: index.php');
                    }
                }
            
        } catch (\Throwable $th) {
                //throw $th;
                echo '<div class="alert alert-danger" id="error">Something went <strong>wrong</strong>!</div>';
        }
	}
    
   

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Todo</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <div class="container">
        <div class="form-group">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Sign in</h1>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Login">
                    </div>
                    <div class="form-group">
                        <a href="register.php" class="btn btn-primary white" name="register">Don't have an account? Register</a>
                    </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>