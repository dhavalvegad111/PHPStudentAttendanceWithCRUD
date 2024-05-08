<?php

include 'config.php';

$header = implode("",file('./templates/t_header.html'));
$content = implode("",file('./templates/t_view_attendance.html'));
$footer = implode("",file('./templates/t_footer.html'));

$header = str_replace('--TITLE--', "View Attendance", $header);

if(isset($_POST['attendance_date'])) {

$attendance_date = $_POST['attendance_date'];

$tr_start = $tr_end = $tr_data = $tr_temp = $tr_final = "";

// $sql = "SELECT s.*, a.attendance_status FROM students s LEFT JOIN attendance a ON s.id = a.sid AND a.attendance_date = '$attendance_date';";
// $sql = "SELECT ROW_NUMBER() OVER (ORDER BY s.sid) AS SrNo, s.sid AS StudentID, s.name AS Name, a.attendance_status AS AttendanceStatus FROM students s LEFT JOIN attendance a ON s.sid = a.sid AND a.attendance_date = '$attendance_date'";

$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);

$tr_start = strpos($content,"--TR-START--"); 
$tr_end = strpos($content,"--TR-END--"); 
$tr_data = substr($content,$tr_start,$tr_end - $tr_start);

	if( $num > 0) 
	{
		$counter = 1;
		while($row = mysqli_fetch_assoc($query))
		{
			$tr_temp = $tr_data;
			$tr_temp = str_replace("--COUNTER--",$counter,$tr_temp);
			$tr_temp = str_replace("--ID--",$row['id'],$tr_temp);
			$tr_temp = str_replace("--NAME--",$row['name'],$tr_temp);
			
			if($row['attendance_status'] == "Present"){
				$u_tr_temp = str_replace("--PRESENT--", "checked", $u_tr_temp);
			} elseif ($row['attendance_status'] == "Absent"){
				$u_tr_temp = str_replace("--ABSENT--", "checked", $u_tr_temp);
			}
			$u_tr_temp = str_replace("--ATTENDANCE-STATUS--", $row['attendance_status'], $u_tr_temp);
			$tr_final .= $tr_temp;
			
			$counter++;
		}
	} 
	else 
	{
		$_SESSION['msg'] = 'No data found.';
	}
}
$content = str_replace($tr_data,$tr_final,$content);
// echo $tr_final;

$source = $header.$content.$footer;
echo $source;

?>