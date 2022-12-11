<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] && $_SERVER['HTTP_AUTHORIZATION'] && $_POST['id']) {
        $password = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
        $id = $_POST['id'];
        $sql = "SELECT username,
        email,
        phone 
        FROM supervisors WHERE password = '" . $password . "' AND email='" . $_POST['username'] . "'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "SELECT * FROM posts WHERE supervisors='$id'";
                $result = $conn->query($sql);

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


// username	
// studentNumber
// title	
// discretion
// path_file
// date