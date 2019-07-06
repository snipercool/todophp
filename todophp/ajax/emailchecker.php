<?php
    include_once("../bootstrap.php");
        $email = $_POST['email'];
        $response = [];
    if( User::emailCheck($email) ){
        $response['status'] = 'success';   
    }
    else {
        $response['status'] = 'error';
        $response['error'] = 'email is taken';   
    }
    header('Content-Type: application/json');
    echo json_encode($response);
