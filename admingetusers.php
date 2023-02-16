<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] && $_SERVER['HTTP_AUTHORIZATION'] && $_POST['supervisors']&& $_POST['id']) {
        $password = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
        $supervisors = $_POST['supervisors'];
        $id = $_POST['id'];
        $sql = "SELECT username,
        email,
        phone 
        FROM supervisors WHERE password = '" . $password . "' AND email='" . $_POST['username'] . "'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "SELECT * FROM users WHERE supervisors='$id' ";
                $result = $conn->query($sql);
                // echo 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $room[] = $row;
                        $rows['data']['posts'] = $room;
                        $rows['data']['status'] = '1';
                    }
                } else {
                    $rows['data']['status'] = '0';
                    $rows['data']['error'] = $conn->error;
                }
                // }
            }
        } else {
            $rows['data']['status'] = '0';
            $rows['data']['error'] = $conn->error;
        }
        echo (json_encode($rows, 448));
    }
}
