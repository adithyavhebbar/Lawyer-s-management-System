<?php
include('config.php');
session_start();
$email_id=$_SESSION['email_id'];
$regno=$_SESSION['regno'];
$rating=$_POST['star'];
$sql="delete from rating
		where regno='$regno'
		and email_id='default'";
		$result=$db->query($sql);
		
$sql="delete from rating
		where regno='$regno'
		and email_id='$email_id'";
$result=$db->query($sql);
if(!$result) die("database access failed" .$db->error);



	$query="insert into rating (email_id,regno,rating) values ('$email_id','$regno','$rating')";
	$res=$db->query($query);

$sql="create view final_rating as
		select r.regno,avg(r.rating) as rating
		from rating r
		group by r.regno";
		$result=$db->query($sql);
	
		
		header('location: guest.php');
			


?>