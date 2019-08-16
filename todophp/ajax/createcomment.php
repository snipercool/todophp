<?php
    include_once("../classes/Comment.class.php");
    include_once("../classes/Db.class.php");
        $comment = $_POST['comment'];
        $task = $_POST['task'];
        $response = [];
    if( Comment::create($comment, $task) ){
        $response['status'] = 'success'; 
        $comments = $comment->getAll();
    }
    else {
        $response['status'] = 'error';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
