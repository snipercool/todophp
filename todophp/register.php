<?php

	require_once("bootstrap.php");
	
	if ( !empty($_POST)) {
        $target_dir = "images/uploads/";
        $target_file = $target_dir . $_FILES["avatar"]["name"];
		$user = new User();
		$user->setFullname(htmlspecialchars($_POST['fullname']));
		$user->setUsername(htmlspecialchars($_POST['username']));        
        $user->setEmail(htmlspecialchars($_POST['email']));
        $user->setEducation(htmlspecialchars($_POST['education']));
		$user->setPassword(htmlspecialchars($_POST['password']));
        $user->setPasswordConfirmation($_POST['password_confirmation']);
        $user->setAvatar($target_file);
		

	}
    
   

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="form-group">
            <form action="" method="post">
                <h1>Sign up</h1>
                    <div class="form-group">
                        <label for="avatar">Avatar:</label>
                        <input class="form-control-file" type="file" name="avatar" id="avatar" required>
                    </div>
                    <div class="form-group">
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
                    <div class="alert alert-success" id="usercheck" style="display:none;">Your <strong>Username</strong> is ok.</div>
                    <div class="alert alert-danger" id="usercheck2" style="display:none;">please change your <strong>Username</strong>!</div>
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="text" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password confirmation:</label>
                        <input class="form-control" type="text" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="button" value="Submit">
                    </div>
            </form>
        </div>
    </div>
    <script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
  <script language="JavaScript" type="text/javascript" src="js/emailchecker.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/userchecker.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>