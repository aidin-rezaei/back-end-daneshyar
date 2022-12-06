<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "daneshyar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8');
// // sql to create table
// $sql = "CREATE TABLE post (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// fname text NOT NULL,
// lname text NOT NULL,
// codem text NOT NULL,
// addres text NOT NULL,
// phone text NOT NULL,
// typew text NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }



// $conn->close();
// // sql to create table
// $sql = "CREATE TABLE user (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// username text NOT NULL,
// pass text NOT NULL,
// email text NOT NULL,
// phone text NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// $conn->close();
?>