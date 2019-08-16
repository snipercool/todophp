<?php
    include_once("bootstrap.php");
    

    if (isset($_SESSION['username'])) {
        $user = new User();
        $user->setUsername($_SESSION['username']);
        //var_dump($_SESSION);
    } else {
        header('location: login.php');
    }
    
    $user = new User();
    $users = $user->getAll();
    $count = $user->getCount();

    $list = new Lists();
    $getcount = $list->getCount();


    
    
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
        <table class="table">
            <tr>
                <td><p>Number of users: <?php echo implode(",", $count[0]); ?></p></td>
                <td><p>Number of lists: <?php echo implode(",", $getcount[0]); ?></p></td>
            </tr>
        </table>
    <table class="table">
        <thead>
            <tr>
                <th>users</th>
                <th>make admin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u):?>
                <tr>
                    <td><p><?php echo $u['username']; ?></p></td>
                    <td><a href="<?php if ($u['admin'] == 1) { echo "makeuser.php?user=".$u['username'].""; }else {echo "makeadmin.php?user=".$u['username'].""; } ?>" class="btn btn-primary delete"><?php if ($u['admin'] == 1) { echo "Make user";}else {echo "Make admin"; } ?></a></td>
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