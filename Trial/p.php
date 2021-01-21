<?php
include('config.php');
	//echo "<P align='right'><a href='web.html'><button type='button' style='color:black;'>Back</button></a></p>";
	echo '  <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: black;height:85px;">
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
echo "<div style='margin:10%;font-weight:40px;'>";
	echo "<form action='search1.php' method='POST'>
			<p align='left'> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Search by regno :<input style='color:black;' type='text' name='regno' placeholder='Enter regno searching for'>&nbsp;&nbsp;<input type='submit' name='search' style='color:black;'></p>
			</form>";
	
	$place=$_POST['placeid'];
	$query = "select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pctype,q.llb,q.llm,q.mphil,q.phd,d.designation,c.court_name,p.place_name
	from lawyers l,court c,place p,qualification q,designation d
where d.place_id='$place'
and d.court_abv=c.court_abv
and l.regno=q.regno
and l.regno=d.regno
	and d.place_id=p.place_id";
	$result=$db->query($query);
	if(!$result) die("database access failed" .$db->error);
	$rows=$result->num_rows;
	echo"<table class='bg-light' align='center' style='border:1px solid black;'><tr><th>Reg no</th><th> Name</th><th>gender</th><th>dob</th><th>Residence</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>Place of work</th><th>view</th><th>Delete</th></tr>";
	for ($j = 0 ;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		echo "<tr align='right' style='border:1px solid black;'>";
		for ($k = 0; $k < 9; ++$k)
		{	
			if($k == 0)
			{
				$regno=$row[$k];
			}
			echo "<td style='border:1px solid black;'>$row[$k]</td>";
		}
		
		echo "<form method='POST' action='view.php'>";
		echo " <td style='color:black;'>	<select name='view'>
					<option value='$regno'>View</option>
				</select> &emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
		echo "</form>";
		echo "<form method='POST' action='delete.php'>";
		echo " <td style='color:black;'>	<select name='delete'>
					<option value='$regno'>Delete</option>
				</select> &emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
		echo "</form>";
		echo "</tr>";
	}
	echo "</table></div>";
	
		
?>
	

<!DOCTYPE html>
<html>
<title>Lawyers association</title>
<script language="JavaScript">
    javascript:window.history.forward(1);
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
 
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
	<style>
	th{
		border: 1px solid black;
	}
	</style>
</head>
<body class="bg-dark" >



</body>

</html>