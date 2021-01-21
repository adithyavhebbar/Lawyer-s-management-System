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
   
   $query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pcttype,q.llb,q.llm,q.mphil,q.phd,e.ayearsdc,e.ayearshc,e.ayearssc,e.jyearsdc,e.jyearshc,e.jyearssc,d.designation,d.court_abv,d.place_id,d.since
			from lawyers l,qualification q,experience e,designation d
			where l.regno='$regno'
			and q.regno='$regno'
			and e.regno='$regno'
			and d.regno='$regno'";
	$result=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$result->num_rows;
	for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		for($k = 0 ;$k < 27 ; ++$k)
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
			else if($k == 20)
			{
				$jyearsdc=$row[$k];
			}
			else if($k == 21)
			{
				$jyearshc=$row[$k];
			}
			else if($k == 22)
			{
				$jyearssc=$row[$k];
			}
			else if($k == 23)
			{
				$designation=$row[$k];
			}
			else if($k == 24)
			{
				$court_abv=$row[$k];
			}
			else if($k == 25)
			{
				$place_id=$row[$k];
			}
			else if($k == 26)
			{
				$since=$row[$k];
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
		if(!empty($_POST["ayearsdc"]))
	{
		$ayearsdc=$_POST['ayearsdc'];
	}	
	if(!empty($_POST["ayearshc"]))
	{
		$ayearshc=$_POST['ayearshc'];
	}	
	if(!empty($_POST["ayearssc"]))
	{
		$ayearssc=$_POST['ayearssc'];
	}
	if(!empty($_POST["jyearsdc"]))
	{
		$jyearsdc=$_POST['jyearsdc'];
	}
	if(!empty($_POST["jyearshc"]))
	{
		$jyearshc=$_POST['jyearshc'];
	}
	if(!empty($_POST["jyearssc"]))
	{
		$jyearssc=$_POST['jyearssc'];
	}
	if(!empty($_POST["desination"]))
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
		if(!empty($_POST["since"]))
	{
		$since=$_POST['since'];
	}
	if((!empty($_POST["doorno"]))||(!empty($_POST["street"]))||(!empty($_POST["locality"]))||(!empty($_POST["city"]))||(!empty($_POST["state"]))||(!empty($_POST["pincode"]))||(!empty($_POST["contact_no"]))||(!empty($_POST["email_id"]))||(!empty($_POST["llb"]))||(!empty($_POST["llm"]))||(!empty($_POST["mphil"]))||(!empty($_POST["phd"]))||(!empty($_POST["ayearsdc"]))||(!empty($_POST["ayearshc"]))||(!empty($_POST["ayearssc"]))||(!empty($_POST["jyearsdc"]))||(!empty($_POST["jyearshc"]))||(!empty($_POST["jyearssc"]))||(!empty($_POST["desination"]))||(!empty($_POST["since"])))
	{
	$sql="INSERT INTO review (regno,name,gender,dob,doorno,street,locality,city,state,pincode,contact_no,email_id,pcttype,llb,llm,mphil,phd,ayearsdc,ayearshc,ayearssc,jyearsdc,jyearshc,jyearssc,designation,court_abv,place_id,since)
VALUES('$regno','$name','$gender','$dob','$doorno','$street','$locality','$city','$state','$pincode','$contact_no','$email_id','$pctype','$llb','$llm','$mphil','$phd','$ayearsdc','$ayearshc','$ayearssc','$jyearsdc','$jyearshc','$jyearssc','$designation','$court_abv','$place_id','$since')";
		
$result = $db->query($sql);
if($db->error) exit($db->error);

if (!$result)
   return false;
else
header('location: lawyerwelcome.php');
	}
	header('location: lawyerwelcome.php');
?>