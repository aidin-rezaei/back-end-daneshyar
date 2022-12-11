<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        $_POST['username'] &&
        $_POST['studentNumber'] &&
        $_POST['title'] &&
        $_POST['discretion'] &&
        $_POST['path_file'] &&
        $_POST['supervisors']&&
        $_SERVER['HTTP_AUTHORIZATION']
    ) {
        $sql = "SELECT studentNumber,password FROM users";
        $result = $conn->query($sql);
        $username = $_POST['username'];
        $studentNumber = $_POST['studentNumber'];
        $title = $_POST['title'];
        $discretion = $_POST['discretion'];
        $path_file = $_POST['path_file'];
        $supervisors = $_POST['supervisors'];
        $password = str_replace('Bearer ','',$_SERVER['HTTP_AUTHORIZATION']) ;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["studentNumber"] === $studentNumber and $row["password"] === $password) {
                    $sql = "INSERT INTO `posts`( `username`,
                    `studentNumber`,
                    `title`,
                    `discretion`,
                    `path_file`,
                    `supervisors`
                    ) 
                    VALUES ('$username',
                    '$studentNumber',
                    '$title',
                    '$discretion',
                    '$path_file',
                    '$supervisors'
                    )";
                    if ($conn->query($sql) === TRUE) {
                        $rows['data']['status'] = '1';
                        echo (json_encode($rows, 448));
                    } else {
                        $rows['data']['status'] = '0';
                        $rows['data']['error'] = $conn->error;
                    }
                }
            }
        } else {
            $rows['data']['status'] = '0';
            $rows['data']['error'] = $conn->error;
        }
        echo (json_encode($rows, 448));

       
    }
}








