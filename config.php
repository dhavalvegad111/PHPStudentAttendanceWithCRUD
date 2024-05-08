<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "student_attendance_db";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Failed to connect." . mysqli_connect_error());

session_start();

?>