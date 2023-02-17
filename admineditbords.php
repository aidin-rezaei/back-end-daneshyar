<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        $_POST['id']&&
        $_POST['username']&&
        $_POST['title'] &&
        $_POST['discretion'] &&
        $_POST['path_file'] &&
        $_SERVER['HTTP_AUTHORIZATION']
    ) {
        $sql = "SELECT email,password FROM supervisors";
        $result = $conn->query($sql);
        $id = $_POST['id'];
        $username = $_POST['username'];
        $title = $_POST['title'];
        $discretion = $_POST['discretion'];
        $path_file = $_POST['path_file'];
        $password = str_replace('Bearer ','',$_SERVER['HTTP_AUTHORIZATION']) ;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["email"] === $username and $row["password"] === $password) {
                    $sql = "UPDATE `bords` SET  
                    `title`='$title',
                    `discretion`='$discretion',
                    `path_file`='$path_file'
                     WHERE id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        $rows['data']['status'] = '1';
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




