<?php

include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM `students` WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if($query){
    $_SESSION['msg'] = 'Student deleted successfully.'; 
    header("location:view.php");
} else {
    $_SESSION['msg'] = 'This data is already in use, would not be deleted.';
    header("location:view.php");
}

?>