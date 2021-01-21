<?php
include('config.php');
session_start();
$case_id=$_POST['case_id'];
$_SESSION['case_id']=$case_id;
		
	$query = "select c.case_id,c.case_title,c.cs_date,c.cc_date,c.c_type,c.judgement,cl.lawyer1,cl.lawyer2,cl.lawyer3,cl.lawyer4,co.court_name,p.place_name
				from cases c,place p,court co, clawyer cl
				where c.place_id=p.place_id
				and cl.case_id=c.case_id
				and co.court_abv=c.court_abv
				and c.case_id='$case_id'";
	$result = $db->query($query);
	if(!$result) die("database access failed" .$db->error);
	$rows=$result->num_rows;
	if($rows==0){
		echo "<script>alert('Case with this case_id does not exist')</script>";
		echo "<p>No such case exists</p>";

	}else{
	for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		
		
		echo "<table align='center'>";
		for($k = 0 ;$k < 12 ; ++$k)
		{
			
			if($k == 0)
			{
				echo "<tr>";
				echo "<th class='w3-text-light-grey'>Case_id  </th>";
					echo "<th class='w3-text-light-grey'>:  &nbsp; $row[$k]</th>";
					echo "</tr>";
			}
			else if($k == 1)
			{
				echo "<tr >";
				echo "<th class='w3-text-light-grey'>Case title </th>";
					echo "<th class='w3-text-light-grey'> : &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 2)
			{
				echo "<tr >";
				echo "<th class='w3-text-light-grey'>case start date	 </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 3)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>case close date </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 4)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Case type</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 5)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>judgement </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 6)
			{
				echo "<tr colspan='2'>";
					echo "<th class='w3-text-light-grey'>Lawters handling the case	</th>";
					echo "</tr>";
					echo "<tr>";
					echo "<th class='w3-text-light-grey'> Lawyer 1</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 7)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Lawyer 2</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 8)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Lawyer 3</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 9)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Lawyer 4</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 10)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Court</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 11)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Place</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
		}
		echo "<tr colspan='2' style='color:black;'><td>...</td></tr>";
		echo "</table>";
	}
}
?>
<!DOCTYPE html>
<html>
<title>Lawyers association</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="w3-black"  align="center">
</body>
</html>