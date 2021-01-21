<?php
include('config.php');
session_start();
$regno=$_SESSION['regno'];
$sql="delete from lawyers 
		where regno='$regno'";
$result=$db->query($sql);
if(!$result)
	echo "not deleted";
$query="delete from login
		where regno='$regno'";
$res=$db->query($query);
header('location: lawyer.php');
?>