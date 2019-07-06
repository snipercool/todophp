<?php
    include_once("../bootstrap.php");
        $username = $_POST['username'];
        $response = [];
    if( User::userCheck($username) ){
        $response['status'] = 'success';   
    }
    else {
        $response['status'] = 'error';
        $response['error'] = 'username is taken';   
    }
    header('Content-Type: application/json');
    echo json_encode($response);
