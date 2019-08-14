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
        $list = new Lists();
        $userid = $_POST['userid'];
        $listname = $_POST['listname'];
        $list->deletelList($userid, $listname);

        $task = new Task();
        $listid = $_POST['listid'];
        $task->taskdelete($listid);
        header("Location: index.php");
         
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
    <form class="form-horizontal" action="deletelist.php" method="post">
        <input type="hidden" name="listname" value="<?php echo $_GET['list'];?>"/>
        <input type="hidden" name="listid" value="<?php echo $_GET['id'];?>"/>
        <input type="hidden" name="userid" value="<?php echo $_SESSION['id'][0];?>"/>
            <p class="alert alert-error">Are you sure to delete <?php echo $_GET['list']; ?> ?</p>
                <div class="form-actions">
            <button type="submit" class="btn btn-success">Yes</button>
        <a class="btn btn-danger" href="index.php">No</a>
                </div>
    </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>