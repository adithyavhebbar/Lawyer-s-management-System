<?php
session_start();
$regno=$_SESSION['regno'];
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'dbms');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($db->connect_error) die("Database access failed:" .$db->error);
	$regno=$_SESSION['regno'];
	?>
    <hr style="width:200px" >
    <p></p>
   <?php
   
   $query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pctype,q.llb,q.llm,q.mphil,q.phd,d.designation,d.court_abv,d.place_id
			from lawyers l,qualification q,designation d
			where l.regno='$regno'
			and q.regno='$regno'
			and d.regno='$regno'";
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
				$ayearsdc=$row[$k];
			}
			else if($k == 18)
			{
				$ayearshc=$row[$k];
			}
			else if($k == 19)
			{
				$ayearssc=$row[$k];
			}
		}
		
	}
	if(!empty($_POST["doorno"]))
	{
		$doorno=$_POST['doorno'];
	}
		if(!empty($_POST["street"]))
	{
		$street=$_POST['street'];
		
	}
		if(!empty($_POST["locality"]))
	{
		$locality=$_POST['locality'];
	}
		if(!empty($_POST["city"]))
	{
		$city=$_POST['city'];
	}
		if(!empty($_POST["state"]))
	{
		$state=$_POST['state'];
	}
		if(!empty($_POST["pincode"]))
	{
		$pincode=$_POST['pincode'];
	}
		if(!empty($_POST["contact_no"]))
	{
		$contact_no=$_POST['contact_no'];
	}
		if(!empty($_POST["email_id"]))
	{
		$email_id=$_POST['email_id'];
	}
		if(!empty($_POST["pctype"]))
	{
		$pctype=$_POST['pctype'];
	}
		if(!empty($_POST["llb"]))
	{
		$llb=$_POST['llb'];
	}
		if(!empty($_POST["llm"]))
	{
		$llm=$_POST['llm'];
	}
		if(!empty($_POST["mphil"]))
	{
		$mphil=$_POST['mphil'];
	}
		if(!empty($_POST["phd"]))
	{
		$phd=$_POST['phd'];
	}
		
	if(!empty($_POST["designation"]))
	{
		$designation=$_POST['designation'];
	}
	if(!empty($_POST["court_abv"]))
	{
		$court_abv=$_POST['court_abv'];
	}
	if(!empty($_POST["place_id"]))
	{
		$place_id=$_POST['place_id'];
	}
	
	$q="select *
	from review
	where regno='$regno'";
	echo $regno;
	echo $q;
	$results=$db->query($q);
	if(!$results) die("Database access failed: " .$db->error);
	$rows=$results->num_rows;
	if($rows!=0)
	{
		$d="delete from review 
		where regno='$regno'";
		echo $regno;
		$res=$db->query($d);
		$r=$results->num_rows;
		if(!$res) die("Database access failed: " .$db->error);
	}
	if((!empty($_POST["doorno"]))||(!empty($_POST["street"]))||(!empty($_POST["locality"]))||(!empty($_POST["city"]))||(!empty($_POST["state"]))||(!empty($_POST["pincode"]))||(!empty($_POST["contact_no"]))||(!empty($_POST["email_id"]))||(!empty($_POST["llb"]))||(!empty($_POST["llm"]))||(!empty($_POST["mphil"]))||(!empty($_POST["phd"]))||(!empty($_POST["designation"]))||(!empty($_POST["since"])))
	{
	$sql="INSERT INTO review (regno,name,gender,dob,doorno,street,locality,city,state,pincode,contact_no,email_id,pctype,llb,llm,mphil,phd,designation,court_abv,place_id)
VALUES('$regno','$name','$gender','$dob','$doorno','$street','$locality','$city','$state','$pincode','$contact_no','$email_id','$pctype','$llb','$llm','$mphil','$phd','$designation','$court_abv','$place_id')";
		
$result = $db->query($sql);
if($db->error) exit($db->error);

if (!$result)
   return false;
else
header('location: lawyerwelcome.php');
	}
	header('location: lawyerwelcome.php');
?>