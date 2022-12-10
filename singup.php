<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        $_POST['username'] && $_POST['studentNumber'] &&
        $_POST['phone'] &&
        $_POST['email'] &&
        $_POST['supervisor'] &&
        $_POST['password']
    ) {
        $username = $_POST['username'];
        $studentNumber = $_POST['studentNumber'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $supervisor = $_POST['supervisor'];
        $password = md5($_POST["password"]);
        $sql = "INSERT INTO `users`( `username`,
        `studentNumber`,
        `phone`,
        `email`,
        `supervisor`,
        `password`) 
        VALUES ('$username',
        '$studentNumber',
        '$phone',
        '$email',
        '$supervisor',
        '$password')";
        if ($conn->query($sql) === TRUE) {
            $rows['data']['users']['username'] = $studentNumber;
            $rows['data']['users']['hash'] = $password;
            $rows['data']['status'] = '1';
            echo (json_encode($rows, 448));
        } else {
            $rows['data']['status'] = '0';
            $rows['data']['error'] = $conn->error;
        }
    }
}
