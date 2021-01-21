
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
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
	}
</style>

</head>
<body class="w3-black" >
<P align='right'><a href='lawyer.php'><button type='button' style='color:black;'>Back</button></a></p>
<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h2><span class="w3-hide-small">Ministry of Law and Justice (India)<image src="e2.png" class="w3-image" width="50" height="75"></span></h2>
    <h1><span class="w3-hide-small"> ALL INDIA LAWYERS ASSOCIATION</span></h1>
  </header>
 <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="signup">
    <h2 class="w3-text-light-grey">You case details are :</h2>
<?php
include('config.php');
session_start();
$case_id=$_POST['case_id'];
$_SESSION['case_id']=$case_id;
		
	$query = "select c.case_id,c.case_title,c.cs_date,c.cc_date,c.c_type,c.judgement,j.jto1,j.jto2,j.jto3,j.jto4,cl.lawyer1,cl.lawyer2,cl.lawyer3,cl.lawyer4,co.court_name,p.place_name
				from cases c,place p,court co,clawyer cl,judgement j
				where c.case_id=j.case_id
				and c.case_id=cl.case_id
				and c.place_id=p.place_id
				and co.court_abv=c.court_abv
				and c.case_id='$case_id'";
	$result = $db->query($query);
	if(!$result) die("database access failed" .$db->error);
	$rows=$result->num_rows;
				
		
	for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		
		
		echo "<table >";
		for($k = 0 ;$k < 16 ; ++$k)
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
					echo "<th class='w3-text-light-grey'>judgement towads </th>";
					echo "</tr>";
					echo "<tr>";
					echo "<th class='w3-text-light-grey'>1</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 7)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>2</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 8)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>3</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 9)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>4</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 10)
			{
				echo "<tr colspan='2'>";
					echo "<th class='w3-text-light-grey'>Lawyers handling the case	</th>";
					echo "</tr>";
					echo "<tr>";
					echo "<th class='w3-text-light-grey'> Lawyer 1</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 11)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Lawyer 2</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 12)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Lawyer 3</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 13)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Lawyer 4</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 14)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Court</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 15)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Place</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
		
			
			
			
		}
		
		echo "</table>";
	}
?>
  </div>
	 <div class="w3-padding-64 w3-content" id="admin">
    <h2 class="w3-text-light-grey">Update case info</h2>
    <hr style="width:200px" class="w3-opacity">
    <p></p>
    <p><a href="upcase.html"><button style="color:black;" type="button">update</button></a></p>
      </div>


</body>

</html>