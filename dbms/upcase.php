<?php
session_start();
$case_id=$_SESSION['case_id'];
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
   
   $query="select c.case_id,c.case_title,c.cs_date,c.cc_date,c.c_type,c.judgement,j.jto1,j.jto2,j.jto3,j.jto4,cl.lawyer1,cl.lawyer2,cl.lawyer3,cl.lawyer4,c.court_abv,c.place_id
			from cases c,judgement j,clawyer cl
			where c.case_id='$case_id'
			and j.case_id='$case_id'
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
				$c_type=$row[$k];
			}
			else if($k == 5)
			{
				$judgement=$row[$k];
			}
			else if($k == 6)
			{
				$jto1=$row[$k];
			}
			else if($k == 7)
			{
				$jto2=$row[$k];
			}
			else if($k == 8)
			{
				$jto3=$row[$k];
			}
			else if($k == 9)
			{
				$jto4=$row[$k];
			}
			else if($k == 10)
			{
				$lawyer1=$row[$k];
			}
			else if($k == 11)
			{
				$lawyer2=$row[$k];
			}
			else if($k == 12)
			{
				$lawyer3=$row[$k];
			}
			else if($k == 13)
			{
				$lawyer4=$row[$k];
			}
			else if($k == 14)
			{
				$court_abv=$row[$k];
			}
			else if($k == 15)
			{
				$place_id=$row[$k];
			}
			
		}
		
	}
	if(!empty($_POST["b"]))
	{
		$case_title=$_POST['b'];
	}
		if(!empty($_POST["c"]))
	{
		$cs_date=$_POST['c'];
		
	}
		if(!empty($_POST["d"]))
	{
		$cc_date=$_POST['d'];
	}
		if(!empty($_POST["c_type"]))
	{
		$c_type=$_POST['c_type'];
	}
		if(!empty($_POST["e"]))
	{
		$judgement=$_POST['e'];
	}
		if(!empty($_POST["f"]))
	{
		$jto1=$_POST['f'];
	}
		if(!empty($_POST["g"]))
	{
		$jto2=$_POST['g'];
	}
		if(!empty($_POST["h"]))
	{
		$jto3=$_POST['h'];
	}
		if(!empty($_POST["i"]))
	{
		$jto4=$_POST['i'];
	}
		if(!empty($_POST["j"]))
	{
		$lawyer1=$_POST['j'];
	}
		if(!empty($_POST["k"]))
	{
		$lawyer2=$_POST['k'];
	}
		if(!empty($_POST["l"]))
	{
		$lawyer3=$_POST['l'];
	}
		if(!empty($_POST["m"]))
	{
		$lawyer4=$_POST['m'];
	}
		if(!empty($_POST["n"]))
	{
		$court_abv=$_POST['n'];
	}	
		if(!empty($_POST["o"]))
	{
		$place_id=$_POST['o'];
	}	

	if((!empty($_POST["a"]))||(!empty($_POST["b"]))||(!empty($_POST["c"]))||(!empty($_POST["d"]))||(!empty($_POST["f"]))||(!empty($_POST["g"]))||(!empty($_POST["h"]))||(!empty($_POST["i"]))||(!empty($_POST["j"]))||(!empty($_POST["k"]))||(!empty($_POST["l"]))||(!empty($_POST["m"])))
	{
	$sql="update cases
		  SET case_title='$case_title',cs_date='$cs_date',cc_date='$cc_date',c_type='$c_type',judgement='$judgement',court_abv='$court_abv',place_id='$place_id'
		  where case_id='$case_id'";
$result = $db->query($sql);
if($db->error) exit($db->error);
$sql="update clawyer
		  SET lawyer1='$lawyer1',lawyer2='$lawyer2',lawyer3='$lawyer3',lawyer4='$lawyer4'
		  where case_id='$case_id'";
$result = $db->query($sql);
if($db->error) exit($db->error);
$sql="update judgement
		  SET jto1='$jto1',jto2='$jto2',jto3='$jto3',jto4='$jto4'
		  where case_id='$case_id'";
$result = $db->query($sql);
if($db->error) exit($db->error);


header('location: adminwelcome.html');
	}
	header('location: adminwelcome.html');
?>