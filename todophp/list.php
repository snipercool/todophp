<?php
    include_once("bootstrap.php");
    

    if (isset($_SESSION['username'])) {
        $user = new User();
        $user->setUsername($_SESSION['username']);
        //var_dump($_SESSION);
    } else {
        header('location: login.php');
    }
    
    $_SESSION["listpage"] = $_SERVER["REQUEST_URI"];

    $task = new Task();
    $listid = $_GET['id'];
    $tasks = $task->getAll($listid);

    $date = date('Y-m-d');


    
    
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
    <a href="index.php" class="btn btn-primary white" id="logout">Go back</a>

    <div class="container taskcontainer">
    <h1 class="title"><?php echo $_GET['name']; ?></h1>
    <div class="alert alert-danger" id="taskerror" style="display:none;">please name your task!</div>
    <div class="create-group">
            <label class="tasklabel" for="name">Name:</label>
            <label class="tasklabel" for="time">Estimated time:</label>
            <label class="tasklabel" for="enddate">End date:</label>
    </div>
    <div class="create-group">
            <input class="form-control" type="text" name="taskname" id="taskname" data-index="<?php echo $_GET['id'] ?>">
            <input class="form-control" type="time" name="timestamp" id="time">
            <input type="date" name="datestamp" id="enddate">
            <input class="btn btn-success" type="submit" name="createtask" id="createtask" value="Create Task">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Estimated time</th>
                <th>End date</th>
                <th>Done</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $t):?>
            <?php $date1 = date('Y-m-d'); $date2 = $t['enddate']; 
                    $d1 = strtotime($date1); $d2 = strtotime($date2);
                    $years = date('Y', $d2) - date('Y', $d1); 
                    $months = date('m', $d2) - date('m', $d1); 
                    $days = date('d', $d2) - date('d', $d1);
                    
                   
            ?>
                <tr>
                    <td><a href="comment.php?id=<?php echo $t['id']; ?>&name=<?php echo $t['title']; ?>" ><?php echo $t['title']; ?></a></td>
                    <td><p><?php echo $t['time']; ?></p></td>
                    <td><p id="<?php if ($days > 0 && $days < 3 ) {echo 'almost';} elseif ($days < 0 ) {echo 'tolate';} ?>"><?php echo $t['enddate']; ?></p></td>
                    <td><a href="" taskid="<?php echo $t['id']; ?>"  data-index="<?php echo $t['title']; ?>" data-listid="<?php echo $listid ?>" id="done<?php echo $t['id']; ?>" class="taskbtn btn <?php if ($t['done'] == '0') {echo 'btn-danger';} else {echo 'btn-success';}?> delete"><?php if ($t['done'] == '0') {echo 'Not Completed';} else {echo 'Completed';}?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/createtask.js"></script>
  <script src="js/done.js"></script>
</body>
</html>