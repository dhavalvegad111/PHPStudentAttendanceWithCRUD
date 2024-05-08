<?php
include 'config.php';

$id = $_GET['id'];
$a = $_GET['a'];

$date = date('Y-m-d');

$sql_check = "SELECT * FROM `attendance` WHERE sid = '$id' AND attendance_date = '$a'";
$query_check = mysqli_query($conn, $sql_check);
$num = mysqli_num_rows($query_check);

if ($num > 0) 
{
    $sql_update = "UPDATE `attendance` SET attendance_status = 'Absent' WHERE sid = '$id' AND attendance_date = '$a'";
    $query_update = mysqli_query($conn, $sql_update);
    $_SESSION['msg'] = 'Attendance marked as "Absent".';
    header('location:view.php');
} 
else 
{
    $sql_insert = "INSERT INTO `attendance` (sid, attendance_status, attendance_date) VALUES ('$id', 'Absent', '$date')";
    $query_insert = mysqli_query($conn, $sql_insert);
    
    if ($query_insert) 
    {
        $_SESSION['msg'] = 'Attendance marked successfully.';
        header('location:view.php');
        exit();
    } 
    else 
    {
        $_SESSION['msg'] = 'Error : unable to mark attendance.';
        header('location:view.php');
    }
}
