<?php
session_start();
$regno=$_POST['accept'];

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'dbms');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($db->connect_error) die("Database access failed:" .$db->error);
	
	
   
 $query = "select * from review
			where regno='$regno'";
	$result=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$result->num_rows;
	for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		for($k = 0 ;$k < 20 ; ++$k)
		{
			
			if($k == 0)
			{
				
			}
			else if($k == 1)
			{
				$name=$row[$k];
			}
			else if($k == 2)
			{
				$gender=$row[$k];
			}
			else if($k == 3)
			{
				$dob=$row[$k];
			}
			else if($k == 4)
			{
				$doorno=$row[$k];
			}
			else if($k == 5)
			{
				$street=$row[$k];
			}
			else if($k == 6)
			{
				$locality=$row[$k];
			}
			else if($k == 7)
			{
				$city=$row[$k];
			}
			else if($k == 8)
			{
				$state=$row[$k];
			}
			else if($k == 9)
			{
				$pincode=$row[$k];
			}
			else if($k == 10)
			{
				$contact_no=$row[$k];
			}
			else if($k == 11)
			{
				$email_id=$row[$k];
			}
			else if($k == 12)
			{
				$pctype=$row[$k];
			}
			else if($k == 13)
			{
				$llb=$row[$k];
			}
			else if($k == 14)
			{
				$llm=$row[$k];
			}
			else if($k == 15)
			{
				$mphil=$row[$k];
			}
			else if($k == 16)
			{
				$phd=$row[$k];
			}
			else if($k == 17)
			{
				$designation=$row[$k];
			}
			else if($k == 18)
			{
				$court_abv=$row[$k];
			}
			else if($k == 19)
			{
				$place_id=$row[$k];
			}
		}
		
	}
	$sql="update lawyers
			set name='$name',gender='$gender',dob='$dob',doorno='$doorno',street='$street',locality='$locality',city='$city',state='$state',pincode='$pincode',contact_no='$contact_no',email_id='$email_id',pctype='$pctype'
where regno='$regno'";
			$result = $db->query($sql);
if($db->error) exit($db->error);
$sql="update qualification
			set llb='$llb',llm='$llm',mphil='$mphil',phd='$phd'
where regno='$regno'";
			$result = $db->query($sql);
if($db->error) exit($db->error);
$sql="update designation
			set designation='$designation',court_abv='$court_abv',place_id='$place_id'
where regno='$regno'";
			$result = $db->query($sql);
if($db->error) exit($db->error);




			
			$query="delete from review
		where regno='$regno'";
$result=$db->query($query);
if($db->error) exit($db->error);
header('location: areview.php');
	
			
			
?>