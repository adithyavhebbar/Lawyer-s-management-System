<?php
include('config.php');
	echo "<P align='right'><a href='adminwelcome.html'><button type='button' style='color:black;'>Back</button></a></p>";
	echo "  <header class='w3-container w3-padding-32 w3-center w3-black' id='home'>
    <h2><span class='w3-hide-small'>Ministry of Law and Justice (India)<image src='e2.png' class='w3-image' width='50' height='75'></span></h2>
    <h1><span class='w3-hide-small'> ALL INDIA LAWYERS ASSOCIATION</span></h1>
  </header>";
	echo "<form action='search1.php' method='POST'>
			<p align='left'> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Search by regno :<input style='color:black;' type='text' name='regno' placeholder='Enter regno searching for'>&nbsp;&nbsp;<input type='submit' name='search' style='color:black;'></p>
			</form>";
	
	
	$query = "select l.regno,l.name,l.gender,l.dob,l.city,l.contact_no,l.email_id,l.pcttype,p.place_name
				from lawyers l,place p,designation d
				where d.place_id=p.place_id
				and d.regno=l.regno";
	$result=$db->query($query);
	if(!$result) die("database access failed" .$db->error);
	$rows=$result->num_rows;
	echo"<table align='center'><tr><th>Reg no</th><th> Name</th><th>gender</th><th>dob</th><th>Residence</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>Place of work</th><th>view</th><th>Delete</th></tr>";
	for ($j = 0 ;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		echo "<tr align='right'>";
		for ($k = 0; $k < 9; ++$k)
		{	
			if($k == 0)
			{
				$regno=$row[$k];
			}
			echo "<td>$row[$k]</td>";
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
	echo "</table>";
	
		
?>
	

<!DOCTYPE html>
<html>
<title>Lawyers association</title>
<script language="JavaScript">
    // javascript:window.history.forward(1);
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../Bootstrap/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.css"/>
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
</style>

</head>
<body class="w3-black"  >
<a class="btn btn-info mt-lg-3" style="margin-left: 6%;" href="detailpdf.php" role="button">Export as PDF</a>
</body>

</html>