<?php
// include('config.php');
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json; charset=utf-8');
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// if ($_POST['studentNumber'] && $_POST['password']) {
//     $room[] = $_POST['studentNumber'];
//     $room[] = $_POST['password'];
// }}
$room['auth'] = $_SERVER['HTTP_AUTHORIZATION'];
// }
// $sql = "SELECT id,username,password,email,phone FROM supervisors";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     while ($row = $result->fetch_assoc()) {
//         $room[] = $row;
//     }
// }
// $rows['admins'] = $room;

// // $rows['auth'] = $_SERVER['HTTP_AUTHORIZATION'];
echo (json_encode($room, 448));
