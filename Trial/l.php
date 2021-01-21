<?php
include('config.php');
session_start();
$regno=$_POST['regno'];
$_SESSION['regno']=$regno;

echo '<nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: black;height:85px;">
<div class="container" style="background-color: black;">
<a class="navbar-brand js-scroll-trigger" href="#page-top" style="color:white">Ministry Of Law and Justice(India)<image src="img/e4.jpg" class="w3-image" width="50" height="75"></image></a>
<button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
Menu
<i class="fas fa-bars"></i>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
	<ul class="navbar-nav ml-auto">
	   <li class="nav-item mx-0 mx-lg-1">
		  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php"  onmouseover="{this.style.backgroundColor="#343a40";this.style.color="white"}" onmouseout="this.style.backgroundColor="#000000"" onmouseout="this.style.backgroundColor="#fff"">LogOut</a>
	   </li>
	</ul>
</div>
</div>
</nav>';
	$query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.pincode,l.contact_no,l.email_id,l.pctype,q.llb,q.llm,q.mphil,q.phd,d.designation,c.court_name,p.place_name
			from lawyers l,court c,place p, qualification q, designation d
			where l.regno='$regno'
			and q.regno=l.regno
			and d.court_abv=c.court_abv
			and d.place_id=p.place_id";
				
		$result=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$result->num_rows;
	if($rows == 0){
		header("Location: lawyer.php");
	}
	
	for ($j = 0;$j < 1 ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		
		
		echo "<table align='center'>";
		for($k = 0 ;$k < 19 ; ++$k)
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
					echo "<th class='w3-text-light-grey'>LLB </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 13)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>LLM   </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 14)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>M.Phil  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 15)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>PhD </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			
			else if($k == 16)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Designation</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 17)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>working in</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 18)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Place of work</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			
			
			
			
		}
		echo "<tr colspan='2' style='color:black;'><td>...</td></tr>";
		echo "<tr colspan='2'><td align='center'><a href='delete4.php'><button type='button'>Delete</button></a></td></tr>";
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Lawyers Association</title>
<!-- Custom fonts for this theme -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="font.css" rel="stylesheet" type="text/css">
<link href="font1.css" rel="stylesheet" type="text/css">
<!-- Theme CSS -->
<link href="css/freelancer.min.css" rel="stylesheet">
<style>

table, th, td {
	margin-top:7%;
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
	}
	

</style>

</head>
<body class="w3-black"  align="center">



</body>

</html>