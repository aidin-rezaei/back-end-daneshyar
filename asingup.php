<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        $_POST['username'] &&
        $_POST['phone'] &&
        $_POST['email'] &&
        $_POST['password']
    ) {
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = md5($_POST["password"]);
        $sql = "INSERT INTO `supervisors`( `username`,
        `phone`,
        `email`,
        `password`) 
        VALUES ('$username',
        '$phone',
        '$email',
        '$password')";
        if ($conn->query($sql) === TRUE) {
            $rows['data']['users']['username'] = email;
            $rows['data']['users']['hash'] = $password;
            $rows['data']['status'] = '1';
            echo (json_encode($rows, 448));
        } else {
            $rows['data']['status'] = '0';
            $rows['data']['error'] = $conn->error;
        }
    }
}



// Full texts	
// id
// username
// password
// phone
// email