<?php

include 'config.php';

$header = implode("",file('./templates/t_header.html'));
$content = implode("",file('./templates/t_edit.html'));
$footer = implode("",file('./templates/t_footer.html'));

$header = str_replace('--TITLE--', "Update Student", $header);

// UPDATE QUERY
if(isset($_POST['edit'])){
    $id = $_POST['uid'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $birthdate = $_POST['birthdate'];
    $city = $_POST['city'];
    
    $sql_update = "UPDATE `students` SET `name`='$name',`gender`='$gender',`status`='$status',`birthdate`='$birthdate',`city`='$city' WHERE `id` = '$id'";
    $query_update = mysqli_query($conn, $sql_update);
    
    if ($query_update == 1) {
        header("location:view.php");
        $_SESSION['msg'] = 'Student updated successfully.';
    } else {
        $_SESSION['msg'] = 'Error in update student.';
    }
}

// SELECT QUERY
$id = $_GET['id'];
$sql_select = "SELECT * from `students` WHERE id = '$id'";
$query_select = mysqli_query($conn, $sql_select);
$num = mysqli_num_rows($query_select);

$u_tr_start = $u_tr_end = $u_tr_data = $u_tr_temp = $u_tr_final = $msg_start = "";

if($num > 0) 
{
    $counter = 1;
    while($row = mysqli_fetch_assoc($query_select))
    {        
        $u_tr_start = strpos($content, "--U-TR-START--");
        $u_tr_end = strpos($content, "--U-TR-END--");
        $u_tr_data = substr($content, $u_tr_start, $u_tr_end - $u_tr_start);
        
        $u_tr_temp = $u_tr_data;
        $u_tr_temp = str_replace("--ID--", $row['id'], $u_tr_temp);
        $u_tr_temp = str_replace("--U-NAME--", $row['name'], $u_tr_temp);

        if($row['gender'] == "Male"){
            $u_tr_temp = str_replace("--MALE--", "checked", $u_tr_temp);
        } elseif ($row['gender'] == "Female"){
            $u_tr_temp = str_replace("--FEMALE--", "checked", $u_tr_temp);
        } elseif ($row['gender'] == "Other"){
            $u_tr_temp = str_replace("--OTHER--", "checked", $u_tr_temp);
        }
        $u_tr_temp = str_replace("--U-GENDER--", $row['gender'], $u_tr_temp);

        if($row['status'] == "Unmarried"){
            $u_tr_temp = str_replace("--UNMARRIED--", "checked", $u_tr_temp);
        } elseif($row['status'] == "Married"){
            $u_tr_temp = str_replace("--MARRIED--", "checked", $u_tr_temp);
        }     
        $u_tr_temp = str_replace("--U-STATUS--", $row['status'], $u_tr_temp);
        
        $u_tr_temp = str_replace("--U-BIRTHDATE--", $row['birthdate'], $u_tr_temp);
        $u_tr_temp = str_replace("--U-CITY--", $row['city'], $u_tr_temp);

        $u_tr_final .= $u_tr_temp;
        
        $counter++;
    }
}

$content = str_replace($u_tr_data, $u_tr_final, $content);
// echo $u_tr_final;

$source = $header.$content.$footer;
echo $source;

?>



