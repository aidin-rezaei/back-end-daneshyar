<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['studentNumber'] && $_POST['password']) {
        $sql = "SELECT username,
        studentNumber,
        password,
        phone,
        email,
        supervisor FROM users";
        $result = $conn->query($sql);
        $password = md5($_POST['password']);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (
                    $row["studentNumber"] === $_POST['studentNumber']
                    and $row["password"] === $password
                ) {
                    $room[] = $row;
                    $rows['data']['user'] = $room;
                    $rows['data']['status'] = '1';
                    echo (json_encode($rows, 448));
                }
            }
        } else {
            $rows['data']['status'] = '0';
            $rows['data']['error'] = $conn->error;
        }
    }
}
