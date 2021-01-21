<?php
$con=mysqli_connect("localhost","root","","dbms");
if(mysqli_connect_errno())
{
	echo "error is occured:" . mysqli_connect_error();
}

$sql="INSERT INTO customer (email_id,password) 
VALUES
('$_POST[email_id]','$_POST[password]')";

if (!mysqli_query($con,$sql))
  {
	  
 die('Error: ' . mysqli_error($con));  
  }
  header('location: index.html');
//echo "1 record added";
mysqli_close($con);
?>
