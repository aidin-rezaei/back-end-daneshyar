<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['studentNumber'] && $_SERVER['HTTP_AUTHORIZATION']) {
        $password = str_replace('Bearer ','',$_SERVER['HTTP_AUTHORIZATION']) ;
        $sql = "SELECT username,
        studentNumber,
        phone,
        email,
        supervisor FROM users WHERE password = '".$password."'&& studentNumber='".$_POST['studentNumber']."'";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // if (
                //     $row["studentNumber"] === $_POST['studentNumber']
                //     and $row["password"] === $password
                // ) {
                    $room[] = $row;
                    $rows['data']['user'] = $room;
                    $rows['data']['status'] = '1';
                // }
            }
        } else {
            $rows['data']['status'] = '0';
            $rows['data']['error'] = $conn->error;
        }
        echo (json_encode($rows, 448));

    }
}
