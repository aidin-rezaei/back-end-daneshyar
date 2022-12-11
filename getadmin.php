<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] && $_SERVER['HTTP_AUTHORIZATION']) {
        $password = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
        $sql = "SELECT id,username,
        email,
        phone 
        FROM supervisors WHERE password = '" . $password . "' AND email='" . $_POST['username'] . "'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // if (
                //     $row["studentNumber"] === $_POST['studentNumber']
                //     and $row["password"] === $password
                // ) {
                $room[] = $row;
                $rows['data']['admin'] = $room;
                $rows['data']['status'] = '1';
                echo (json_encode($rows, 448));
                // }
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