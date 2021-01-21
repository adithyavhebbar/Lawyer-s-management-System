<?php
session_start();

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'dbms');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($db->connect_error) die("Database access failed:" .$db->error);
	if(isset($_COOKIE['case_id']))
                $case_id=$_COOKIE['case_id'];
	?>
    <hr style="width:200px" >
    <p></p>
   <?php
   
   $query="select c.case_id,c.case_title,c.cs_date,c.cc_date,c.judgement,cl.lawyer1,cl.lawyer2,cl.lawyer3,cl.lawyer4,c.court_abv,c.place_id
                             from cases c,clawyer cl
                            where c.case_id='$case_id'
                            and cl.case_id='$case_id'";
			
	$result=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$result->num_rows;
	for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		for($k = 0 ;$k < 16 ; ++$k)
		{
			
		
			 if($k == 0)
			{
				$case_id=$row[$k];
			}
			else if($k == 1)
			{
				$case_title=$row[$k];
			}
			else if($k == 2)
			{
				$cs_date=$row[$k];
			}
			else if($k == 3)
			{
				$cc_date=$row[$k];
			}
			else if($k == 4)
			{
				$judgement=$row[$k];
			}
			else if($k == 5)
			{
				$lawyer1=$row[$k];
			}
			else if($k == 6)
			{
				$lawyer2=$row[$k];
			}
			else if($k == 7)
			{
				$lawyer3=$row[$k];
			}
			else if($k == 8)
			{
				$lawyer4=$row[$k];
			}
			else if($k == 9)
			{
				$court_abv=$row[$k];
			}
			else if($k == 10)
			{
				$place_id=$row[$k];
			}
			
		}
		
	}
	if(!empty($_POST["case_title"]))
	{
		$case_title=$_POST['case_title'];
	}
		if(!empty($_POST["start_date"]))
	{
		$cs_date=$_POST['start_date'];
		
	}
		if(!empty($_POST["end_date"]))
	{
		$cc_date=$_POST['end_date'];
	}
		if(!empty($_POST["judgement"]))
	{
		$judgement=$_POST['judgement'];
	}
		if(!empty($_POST["lawyer1"]))
	{
		$lawyer1=$_POST['lawyer1'];
	}
		if(!empty($_POST['lawyer2']))
	{
		$lawyer2=$_POST['lawyer2'];
	}
		if(!empty($_POST["lawyer3"]))
	{
		$lawyer3=$_POST['lawyer3'];
	}
		if(!empty($_POST["lawyer4"]))
	{
		$lawyer4=$_POST['lawyer4'];
	}
		if(!empty($_POST["court_abv"]))
	{
		$court_abv=$_POST['court_abv'];
	}
		if(!empty($_POST["place_id"]))
	{
		$place_id=$_POST['place_id'];
	}
		
	if((!empty($_POST["case_title"]))||(!empty($_POST["start_date"]))||(!empty($_POST["end_date"]))||(!empty($_POST["judgement"]))||(!empty($_POST["lawyer1"]))||(!empty($_POST["lawyer2"]))||(!empty($_POST["lawyer3"]))||(!empty($_POST["lawyer4"]))||(!empty($_POST["court_abv"]))||(!empty($_POST["place_id"])))
	{
	$sql="update cases
		  SET case_title='$case_title',cs_date='$cs_date',cc_date='$cc_date',judgement='$judgement',court_abv='$court_abv',place_id='$place_id'
		  where case_id='$case_id'";
	$result = $db->query($sql);
	if($db->error) exit($db->error);
	$sql="update clawyer
		  SET lawyer1='$lawyer1',lawyer2='$lawyer2',lawyer3='$lawyer3',lawyer4='$lawyer4'
		  where case_id='$case_id'";
	$result = $db->query($sql);
	if($db->error) exit($db->error);
	header('location: case.php');
	}
	header('location: case.php');
?>