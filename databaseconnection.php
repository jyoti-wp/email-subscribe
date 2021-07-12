<?php

$server = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'login_user';

$mysqli = new mysqli($server, $user, $password, $dbname);

if ($mysqli->connect_errno) {
    echo 'No Connection';
} else {
    echo "Connection Successful";
}

$sql = "CREATE TABLE my_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    subscribed VARCHAR(50),
    is_verified VARCHAR(50),
    verification_code VARCHAR(50),
    unsubscribe_hash VARCHAR(50),
    reg_date TIMESTAMP default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($mysqli->query($sql) === true) {
    // echo "Table My Guests created successfully";
} else {
    // echo "There has been an error";
}
