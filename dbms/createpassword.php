<?php
include('config.php');
session_start();
$insertid=$_SESSION['insertid'];
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
	
}
$email_id='default';
$rating=0;
$password=random_password(8);
$data=0;
$query = "INSERT INTO login (regno,psw) VALUES ('$insertid','$password')";
$data=mysqli_query($db,$query);
$sql="insert into rating (email_id,regno) values ('$email_id','$insertid')";
$res=mysqli_query($db,$sql);
if($data)
{
	echo "<SCRIPT>
alert('password sent to mail_id of lawyer');
window.location='adminwelcome.html';
</SCRIPT>"; 
}
?>
