<html>
<head>
	<link rel="stylesheet" href="../bootstrap/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.css"/>
</head>
<?php
include('config.php');
	echo "<P align='right'><a href='adminwelcome.html'><button type='button' style='color:black;'>Back</button></a></p>";
	
	
	$query = "select * from review";
	$result=$db->query($query);
	if(!$result) die("database access failed" .$db->error);
	$rows=$result->num_rows;
	if($rows == 0)
	{
		echo "<p>No updations</p>";
	}
	
	
	for ($j = 0 ;$j < $rows ; ++$j)
	{
		echo "<div class='tablehor'>";
		echo"<table><tr><th>Reg no</th><th> Name</th><th>gender</th><th>dob</th><th>doorno</th><th>street</th><th>locality</th><th>city</th><th>state</th><th>pincode</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>llb</th><th>llm</th><th>mphil</th><th>phd</th><th>ayearsdc</th><th>ayearshc</th><th>ayearssc</th><th>jyearsdc</th><th>jyearshc</th><th>jyearssc</th><th>designation</th><th>court_abv</th><th>place_id</th><th>since</th></tr>";
		echo "<tr colspan='27'><td>Updates submitted</td></tr>";
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		echo "<tr align='right'>";
		
		
		for ($k = 0; $k < 27; ++$k)
		{	
			if($k == 0)
			{
				$regno=$row[$k];
			}
			echo "<td>$row[$k]</td>";
		}
		
		
	 
   $query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pcttype,q.llb,q.llm,q.mphil,q.phd,e.ayearsdc,e.ayearshc,e.ayearssc,e.jyearsdc,e.jyearshc,e.jyearssc,d.designation,d.court_abv,d.place_id,d.since
			from lawyers l,qualification q,experience e,designation d
			where l.regno='$regno'
			and q.regno='$regno'
			and e.regno='$regno'
			and d.regno='$regno'";
	$res=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$res->num_rows;
		echo "<tr colspan='29'><td>current data</td></tr>";
		for ($i = 0 ;$i < 1 ; ++$i)
		{
			$res->data_seek($j);
			$row=$res->fetch_array(MYSQLI_NUM);
			echo "<tr align='right'>";
			for ($k = 0; $k < 27; ++$k)
			{	
				
				echo "<td>$row[$k]</td>";
			}
			echo "<form method='POST' action='accept.php'>";
			echo "<tr colspan='27'>";
				echo " <td nowrap style='color:black;'>	<select name='accept'>
					<option value='$regno'>Accept Changes</option>
						</select> &emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
				echo "</form>";
			echo "<form method='POST' action='decline.php'>";
			echo " <td nowrap style='color:black;'>	<select name='decline'>
						<option value='$regno'>Decline Changes</option>
					</select> &emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
			echo "</form>";
			echo "</tr>";
		
		}
		echo "</table>";
		echo "</div>";
		echo "<p><br><br><br></p>";
	
	
	
	
	}
	
	
		
?>
	

<!DOCTYPE html>
<html>
<title>Lawyers association</title>
<script language="JavaScript">
    javascript:window.history.forward(1);
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
table, th, td {
    border: 1px solid white;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
	}
.tablehor{
	overflow-x: auto;
}
</style>

</head>
<body class="w3-black"  >


</body>

</html>