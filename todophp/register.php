<?php

    require_once("bootstrap.php");

	
	if ( isset($_POST['submit'])) {
		try {   
                $user = new User();
                $user->setFullname(htmlspecialchars(($_POST['fullname'])));
                $user->setUsername(htmlspecialchars(($_POST['username'])));        
                $user->setEmail(htmlspecialchars(($_POST['email'])));
                $user->setEducation(htmlspecialchars(($_POST['education'])));
                $user->setPassword(htmlspecialchars(($_POST['password'])));
                $user->setpasswordConfirmation(htmlspecialchars(($_POST['password_confirmation'])));
            
            if($user->emailCheck($_POST['email']) && $user->userCheck($_POST['username']) && $user->passwordCheck($_POST['password'], $_POST['password_confirmation'])){
                if ($user->register()) {
                    $_SESSION['username'] = $user->getUsername();
                    header('location: login.php');
                }
            }else{
                echo '<div class="alert alert-danger" id="error">Something went <strong>wrong</strong>!</div>';
            }
            
        } catch (\Throwable $th) {
                //throw $th;
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
                <h1>Sign up</h1>
                    <div class="form-group">
                    <div class="alert alert-success" id="usercheck" style="display:none;">Your <strong>Username</strong> is ok.</div>
                    <div class="alert alert-danger" id="usercheck2" style="display:none;">please change your <strong>Username</strong>!</div>
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname:</label>
                        <input class="form-control" type="text" name="fullname" id="fullname" required>
                    </div>
                    <div class="form-group">
                    <div class="alert alert-success" id="mailcheck" style="display:none;">Your <strong>email</strong> is ok.</div>
                    <div class="alert alert-danger" id="mailcheck2" style="display:none;">please change your <strong>email</strong>!</div>
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="education">Education:</label>
                        <input class="form-control" type="text" name="education" id="education" required>
                    </div>
                    <div class="alert alert-success" id="passwordcheck" style="display:none;">Your <strong>passwords</strong> match.</div>
                    <div class="alert alert-danger" id="passwordcheck2" style="display:none;">Your <strong>passwords</strong> don't match !</div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password confirmation:</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                    </div>
                    <div class="form-group">
                        <a href="login.php" class="btn btn-primary white" name="login">Already have an account. Login</a>
                    </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/emailchecker.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/userchecker.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/passwordchecker.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>