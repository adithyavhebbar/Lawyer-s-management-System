<?php
include('config.php');
session_start();
$regno=$_POST['view'];
$_SESSION['regno']=$regno;
echo "<P align='right'><a href='lawyer.php'><button type='button' style='color:black;'>Back</button></a></p>";
$query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.pincode,l.contact_no,l.email_id,l.pcttype,q.llb,q.llm,q.mphil,q.phd,e.ayearsdc,e.ayearshc,e.ayearssc,e.jyearsdc,e.jyearshc,e.jyearssc,d.designation,co.court_name,p.place_name,d.since
			from lawyers l,court co,place p,qualification q,experience e,designation d
			where l.regno='$regno'
			and q.regno='$regno'
			and e.regno='$regno'
			and d.regno='$regno'
			and d.court_abv=co.court_abv
			and d.place_id=p.place_id";
				
		$result=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$result->num_rows;
	for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		
		
		echo "<table align='center'>";
		for($k = 0 ;$k < 26 ; ++$k)
		{
			
			if($k == 0)
			{
				echo "<tr>";
				echo "<th class='w3-text-light-grey'>Reg no  </th>";
					echo "<th class='w3-text-light-grey'>:  &nbsp; $row[$k]</th>";
					echo "</tr>";
			}
			else if($k == 1)
			{
				echo "<tr >";
				echo "<th class='w3-text-light-grey'>Name </th>";
					echo "<th class='w3-text-light-grey'> : &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 2)
			{
				echo "<tr >";
				echo "<th class='w3-text-light-grey'>gender	 </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 3)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Date of Birth  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 4)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Door no  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 5)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Street  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 6)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Locality  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 7)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>City  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 8)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Pincode </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 9)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Contact no  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 10)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Email Id  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 11)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Preffered case type  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 12)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>LLB Grad Year</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 13)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>LLM Grad Year  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 14)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>M.Phil Grad Year </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 15)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>PhD Year</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 16)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Advocate expirience in District court  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 17)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Advocate expirience in High court  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 18)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Advocate expirience in Supreme court </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 19)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Judge expirience in District court  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 20)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>judge expirience in High court </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 21)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Jugde expirience in Supreme court </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 22)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Designation</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 23)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>working in</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 24)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Place of work</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 25)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>working in this designation since</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			
			
			
		}
		echo "<tr colspan='2' style='color:black;'><td>...</td></tr>";
		echo "<tr colspan='2'><td align='center'><a href='delete5.php'><button type='button'>Delete</button></a></td></tr>";
		echo "</table>";
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
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
	}
</style>

</head>
<body class="w3-black"  align="center">
<form action="lout.php" method="POST">


</body>

</html>


