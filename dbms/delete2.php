<?php
include('config.php');
$case_id=$_POST['delete'];
$sql="delete from cases 
		where case_id='$case_id'";
$result=$db->query($sql);
if(!$result)
	echo "not deleted";

header('location: case.php');
?>