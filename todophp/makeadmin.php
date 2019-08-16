<?php
    include_once("bootstrap.php");
    

    if (isset($_SESSION['username'])) {
        $user = new User();
        $user->setUsername($_SESSION['username']);
        //var_dump($_SESSION);
    } else {
        header('location: login.php');
    }
    
    if ( !empty($_POST)) {
        $user = new User();
        $username = $_POST['username'];
        $user->makeadmin($username );
        header("Location: admin.php");
         
    }

    
    
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">

</head>
<body>

    <div class="container taskcontainer">
    <form class="form-horizontal" action="makeadmin.php" method="post">
        <input type="hidden" name="username" value="<?php echo $_GET['user'];?>"/>
            <p class="alert alert-error">Are you sure to make <?php echo $_GET['user']; ?> an admin?</p>
                <div class="form-actions">
            <button type="submit" class="btn btn-success">Yes</button>
        <a class="btn btn-danger" href="admin.php">No</a>
                </div>
    </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>