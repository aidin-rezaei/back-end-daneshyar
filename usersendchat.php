<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        $_POST['username'] &&
        $_POST['supervisors'] &&
        $_POST['user'] &&
        $_POST['content'] &&
        $_POST['path_file'] &&
        $_SERVER['HTTP_AUTHORIZATION']
    ) {
        $sql = "SELECT email,password FROM users";
        $result = $conn->query($sql);
        $username = $_POST['username'];
        $supervisors = $_POST['supervisors'];
        $user = $_POST['user'];
        $content = $_POST['content'];
        $path_file = $_POST['path_file'];
        $password = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["studentNumber"] === $username and $row["password"] === $password) {
                    $sql = "INSERT INTO `chats`( `content`,
                        `path_file`,
                        `supervisors`,
                        `user`,
                        `status`,
                        `type`
                        ) 
                        VALUES ('$content',
                        '$path_file',
                        '$supervisors',
                        '$user',
                        '0',
                        'user'
                        )";
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
