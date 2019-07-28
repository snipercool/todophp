<?php

    require_once("bootstrap.php");

	
	if ( !empty($_POST)) {
		try {
            $security = new Security();
            $security->password = ($_POST['password']);
            $security->passwordConfirmation = $_POST['password_confirmation'];
            echo("<script>console.log('whooptiedoop');</script>");
            
            if ($security->verifypasswords()) {
                $user = new User();
                $user->setFullname(($_POST['fullname']));
                $user->setUsername(($_POST['username']));        
                $user->setEmail(($_POST['email']));
                $user->setEducation(($_POST['education']));
                $user->setPassword(($_POST['password']));
                echo("<script>console.log('verify');</script>");
            
            if($user->emailCheck($_POST['email']) && $user->userCheck($_POST['username'])){
                echo("<script>console.log('check');</script>");
                if ($user->register()) {
                    $_SESSION['username'] = $user->getUsername();
                    echo("<script>console.log('session ses');</script>");
                }
            }else{
                echo '<div class="alert alert-danger" id="error">Something went <strong>wrong</strong>!</div>';
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
                        <input class="form-control" type="text" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="education">Education:</label>
                        <input class="form-control" type="text" name="education" id="education" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password confirmation:</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/emailchecker.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/userchecker.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>