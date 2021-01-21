<?php
include('config.php');

	
		echo "<P align='right'><a href='guest.php'><button type='button' style='color:black;'>Back</button></a></p>";
	$query = "select c.case_id,c.case_title,c.cs_date,c.cc_date,c.c_type,c.judgement,j.jto1,j.jto2,j.jto3,j.jto4,cl.lawyer1,cl.lawyer2,cl.lawyer3,cl.lawyer4,co.court_name,p.place_name
				from cases c,place p,court co,judgement j,clawyer cl
				where c.place_id=p.place_id
				and j.case_id=c.case_id
				and cl.case_id=c.case_id
				and co.court_abv=c.court_abv
				and c.judgement='pending'";
				$result = $db->query($query);
	if(!$result) die("database access failed" .$db->error);
	$rows=$result->num_rows;
	echo "<div class='tablehor'>";
	echo"<table><tr><th>Case_id</th><th>Case Title</th><th>case start date</th><th>case close date</th><th>case type</th><th>judgement</th><th>Result towards</th><th>Result towards</th><th>Result towards</th><th>Result towards</th><th>lawyer1</th><th>lawyer2</th><th>lawyer3</th><th>lawyer4</th><th>court</th><th>place</th></tr>";
	for ($j = 0 ;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		echo "<tr align='right'>";
		for ($k = 0; $k < 16; ++$k)
		{	
			if($k == 0)
			{
				$case_id=$row[$k];
			}
			echo "<td>$row[$k]</td>";
		}
	
		
		echo "</tr>";
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
th {
    padding: 5px;

	}
td{
	 padding: 5px;
		width:1px;white-space:nowrap;
}
.tablehor{
	overflow-x: auto;
}


</style>

</head>
<body class="w3-black"  >


</body>

</html>