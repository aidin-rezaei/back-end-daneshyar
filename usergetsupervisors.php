<?php
include('config.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT username,id FROM supervisors  ";
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

echo (json_encode($rows, 448));
