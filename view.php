<?php

include "config.php";

$header = implode("",file('./templates/t_header.html'));
$content = implode("",file('./templates/t_view.html'));
$footer = implode("",file('./templates/t_footer.html'));

$header = str_replace('--TITLE--', "View Student Data", $header);

if (isset($_SESSION['msg'])) {
	$content = str_replace("<!--MSG-->", $_SESSION['msg'], $content);		
	unset($_SESSION['msg']);
}

$date = date('Y-m-d');
$tr_start = $tr_end = $tr_data = $tr_temp = $tr_final = "";

$sql = "SELECT s.*, a.attendance_status, a.attendance_date FROM students s LEFT JOIN attendance a ON s.id = a.sid AND a.attendance_date = '$date' ORDER BY s.id ASC";
$query = mysqli_query($conn, $sql);

$tr_start = strpos($content,"--TR-START--"); 
$tr_end = strpos($content,"--TR-END--"); 
$tr_data = substr($content,$tr_start,$tr_end - $tr_start);
$num = mysqli_num_rows($query);
if( $num > 0) 
{
	$counter = 1;
	while($row = mysqli_fetch_assoc($query))
	{
		$tr_temp = $tr_data;
		$tr_temp = str_replace("--COUNTER--",$counter,$tr_temp);
        $tr_temp = str_replace("--UID--",$row['id'],$tr_temp);
		$tr_temp = str_replace("--NAME--",$row['name'],$tr_temp);
		$tr_temp = str_replace("--GENDER--",$row['gender'],$tr_temp);
		$tr_temp = str_replace("--STATUS--",$row['status'],$tr_temp);
		$tr_temp = str_replace("--BIRTHDATE--",$row['birthdate'],$tr_temp);
		$tr_temp = str_replace("--CITY--",$row['city'],$tr_temp);	
		$tr_temp = str_replace("--ATTENDANCE-DATE--", $row['attendance_date'],$tr_temp);	
		$tr_temp = str_replace("--ATTENDANCE-STATUS--",$row['attendance_status'],$tr_temp);	
		$tr_final .= $tr_temp;
		
		$counter++;
	}
}

$content = str_replace($tr_data,$tr_final,$content);
// echo $tr_final;

$source = $header.$content.$footer;
echo $source;

?>