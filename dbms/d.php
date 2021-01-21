<?php
include('config.php');
$designation=$_POST['designation'];
echo "<P align='right'><a href='guest.php'><button type='button' style='color:black;'>Back</button></a></p>";
$query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pcttype,q.llb,q.llm,q.mphil,q.phd,e.ayearsdc,e.ayearshc,e.ayearssc,e.jyearsdc,e.jyearshc,e.jyearssc,d.designation,c.court_name,p.place_name,d.since
			from lawyers l,court c,place p,qualification q,experience e,designation d
		where d.designation='$designation'
		and d.court_abv=c.court_abv
		and l.regno=q.regno
		and l.regno=e.regno
		and l.regno=d.regno
			and d.place_id=p.place_id";
				
		$result=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$result->num_rows;
	echo "<div class='tablehor'>";
	echo"<table><tr><th>Reg no</th><th> Name</th><th>gender</th><th>dob</th><th>doorno</th><th>street</th><th>locality</th><th>city</th><th>state</th><th><pincode</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>llb</th><th>llm</th><th>Mphil</th><th>phd</th><th>ayearsdc</th><th>ayearshc</th><th>ayearssc</th><th>jyearsdc</th><th>jyearshc</th><th>jyearssc</th><th>designation</th><th>court name</th><th>place</th><th>since</th></tr>";
	for ($j = 0 ;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		echo "<tr align='right'>";
		for ($k = 0; $k < 27; ++$k)
		{	
			if($k == 0)
			{
				$regno=$row[$k];
			}
			echo "<td nowrap>$row[$k]</td>";
		}
	}
		echo "</table>";
		echo "</div>";
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
<body class="w3-black"  align="center">



</body>

</html>


