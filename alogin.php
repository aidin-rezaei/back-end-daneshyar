<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] && $_POST['password']) {
        $sql = "SELECT email,password FROM supervisors";
        $result = $conn->query($sql);
        $password =md5($_POST['password']);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["email"] === $_POST['username'] and $row["password"] === $password) {
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


// Full texts	
// id
// username
// password
// phone
// email