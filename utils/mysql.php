<?php

// Mysql connection
$server = "localhost";
$username = "root";
$password = "123";
$db = "dcjc";

$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
