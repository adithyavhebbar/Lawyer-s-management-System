<?php
include('config.php');

	echo " <nav class='navbar navbar-expand-lg text-uppercase fixed-top' id='mainNav' style='background-color: black;height:85px;'>
	<div class='container' style='background-color: black;'>
	  <a class='navbar-brand js-scroll-trigger' href='#page-top'>Ministry Of Law and Justice(India)<image src='img/e4.jpg' class='w3-image' width='50' height='75'></image></a>
	  <button class='navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
		Menu
		<i class='fas fa-bars'></i>
	  </button>
	  <div class='collapse navbar-collapse' id='navbarResponsive'>
		<ul class='navbar-nav ml-auto'>
		  
		  <li class='nav-item mx-0 mx-lg-1'>
			<a class='nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger' href='logout.php'  onmouseover='{this.style.backgroundColor='#343a40';this.style.color='white'}' onmouseout='this.style.backgroundColor='#000000'' onmouseout='this.style.backgroundColor='#fff''>LogOut</a>
		  </li>
		</ul>
	  </div>
	</div>
  </nav>";
  
  echo "<form action='search2.php' method='POST'>
			<p align='left'> Search by case id :<input style='color:black;' type='text' name='case_id' placeholder='Enter case_id searching for'>&nbsp;&nbsp;<input type='submit' name='search' style='color:black;'></p>
			</form>";
	
	$query = "select c.case_id,c.case_title,c.cs_date,c.cc_date,c.c_type,c.judgement,cl.lawyer1,cl.lawyer2,cl.lawyer3,cl.lawyer4,co.court_name,p.place_name
				from cases c,place p,court co,clawyer cl
				where c.place_id=p.place_id
				and c.case_id=cl.case_id
				and co.court_abv=c.court_abv";
	$result = $db->query($query);
	if(!$result) die("database access failed" .$db->error);
	$rows=$result->num_rows;
	echo "<div class='tablehor'>";
	echo"<table style='margin:7%;background-color:white;'><tr><th>Case_id</th><th>Case Title</th><th>case start date</th><th>case close date</th><th>case type</th><th>judgement</th><th>lawyer1</th><th>lawyer2</th><th>lawyer3</th><th>lawyer4</th><th>court</th><th>place</th><th>update</th><th>Delete</th></tr>";
	for ($j = 0 ;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		echo "<tr align='right'>";
		for ($k = 0; $k < 12; ++$k)
		{	
			if($k == 0)
			{
				$case_id=$row[$k];
			}
			echo "<td>$row[$k]</td>";
		}
		echo "<form method='POST' action='upcase.php'>";
		echo " <td style='color:black;'>	<select name='update'>
					<option value='$case_id'>update</option>
					
				</select> &emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
		echo "</form>";
		echo "<form method='POST' action='delete2.php'>";
		echo " <td style='color:black;'>	<select name='delete'>
					<option value='$case_id'>delete</option>
				</select> &emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
		echo "</form>";
		
		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
	
		
?>
	

<!DOCTYPE html>
<html>
<title>Lawyers association</title>
<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <link rel='stylesheet' href='bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css' />
    <script src='bootstrap/bootstrap-4.3.1-dist/js/bootstrap.js'></script>
    <link rel='stylesheet' href='css/upcase.css'/>
    <link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link href='font.css' rel='stylesheet' type='text/css'>
    <link href='font1.css' rel='stylesheet' type='text/css'>
  
    <!-- Theme CSS -->
    <link href='css/freelancer.min.css' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
   
    <!-- Material Design Bootstrap -->
    <link href='css/mdb.min.css' rel='stylesheet'>
    <!-- Your custom styles (optional) -->
	<link href='css/style.min.css' rel='stylesheet'>
	<style>
		table,th,td{
			border: 1px solid black;
			align-content:center;
		}
</style>
</head>
<body class="w3-black"  >


</body>

</html>