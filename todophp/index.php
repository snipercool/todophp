<?php
    include_once("bootstrap.php");

    session_start();

    if (isset($_SESSION['username'])) {
        $user = new User();
        $user->setUsername($_SESSION['username']);
        $id = $user->getUserId();
        $user->setUserId($id);
    } else {
        header('location: login.php');
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
</head>
<body>
    
</body>
</html>