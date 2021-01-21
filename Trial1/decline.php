<?php
session_start();
$regno=$_POST['decline'];

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'dbms');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($db->connect_error) die("Database access failed:" .$db->error);
	
	$query="delete from review
		where regno='$regno'";
$result=$db->query($query);
if($db->error) exit($db->error);
header('location: areview.php');
	
			
			
?>