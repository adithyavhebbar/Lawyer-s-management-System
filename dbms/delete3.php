<?php
include('config.php');
session_start();
$case_id=$_SESSION['case_id'];
$sql="delete from cases 
		where case_id='$case_id'";
$result=$db->query($sql);
if(!$result)
	echo "not deleted";

header('location: case.php');
?>