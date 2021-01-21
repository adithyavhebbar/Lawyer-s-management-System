<?php
include('config.php');
$regno=$_POST['delete'];
$sql="delete from lawyers 
		where regno='$regno'";
$result=$db->query($sql);
if(!$result)
	echo "not deleted";
$query="delete from login
		where regno='$regno'";
$res=$db->query($query);

$q="delete from review
	where regno='$regno'";
$results=$db->query($q);
$q="delete from rating
	where regno='$regno'";

$results=$db->query($q);
$sql="delete from qualification 
		where regno='$regno'";
$result=$db->query($sql);
$sql="delete from experience
		where regno='$regno'";
$result=$db->query($sql);
$sql="delete from designation 
		where regno='$regno'";
$result=$db->query($sql);
header('location: lawyer.php');
?>