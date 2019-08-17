<?php
    include_once("bootstrap.php");
    

    if (isset($_SESSION['username'])) {
        $user = new User();
        $user->setUsername($_SESSION['username']);
        //var_dump($_SESSION);
    } else {
        header('location: login.php');
    }
    
    $list = new Lists();
    $userid = $_SESSION['id'][0];
    $lists = $list->getAll($userid);
    

    
    
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
    <div id="welcome" class="alert alert-light">Welcome <?php echo $_SESSION['username']?></div>
    <a href="logout.php" class="btn btn-primary white" id="logout">Logout</a>
   

    <div class="container">
         <div class="alert alert-danger" id="listerror" style="display:none;">please name your list!</div>
    <div class="create-group">
            <input class="form-control" type="text" name="listname" id="listname" data-index="<?php echo $_SESSION['id'][0] ?>">
            <input class="btn btn-success" type="submit" name="createlist" id="createlist" value="Create list">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>created on</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lists as $l):?>
                <tr>
                    <td><a href="list.php?id=<?php echo $l['id']; ?>&name=<?php echo $l['name']; ?>" ><?php echo $l['name']; ?></a></td>
                    <td><p><?php echo $l['time']; ?></p></td>
                    <td><a href="deletelist.php?list=<?php echo $l['name'] ?>&id=<?php echo $l['id'] ?>" data-index="<?php echo $l['name']; ?>" class="btn btn-danger delete">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/createlist.js"></script>
</body>
</html>