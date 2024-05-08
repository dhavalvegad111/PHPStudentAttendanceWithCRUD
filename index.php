<?php

include 'config.php';

$header = implode("",file('./templates/t_header.html'));
$content = implode("",file('./templates/t_index.html'));
$footer = implode("",file('./templates/t_footer.html'));

$header = str_replace('--TITLE--', "Add New Student", $header);

if(isset($_POST['add']))
{
    if(!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['status']) && !empty($_POST['birthdate']) && !empty($_POST['city']))
    {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];
        $birthdate = $_POST['birthdate'];
        $city = $_POST['city'];

        $sql = "INSERT INTO students(name, gender, status, birthdate, city) VALUES ('$name','$gender','$status','$birthdate','$city')";
        $query = mysqli_query($conn, $sql);            
            
        if ($query)
        {
            header("location:view.php");
            $_SESSION['msg'] = 'Student added successfully.';
        } else {
            $_SESSION['msg'] = 'Failed to add student.' . mysqli_error($conn);
        }
        
    } else {
        echo 'Please fill student data.';
    }
}

$source = $header.$content.$footer;
echo $source;

?>





