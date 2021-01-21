<!DOCTYPE html>
<html>
<head>
<!-- <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script> -->
<title>Lawyers association</title>
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
</style>
</head>
<body class="w3-black" onload="noBack();"  onpageshow="if (event.persisted) noBack();" onunload="">
  <form action="llogout.php" method="POST">
	  <P align="right"><input style="color:black;" type="submit" name="Log out" value="logout"></p>
	  </form>



<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h2><span class="w3-hide-small">Ministry of Law and Justice (India)<image src="e2.png" class="w3-image" width="50" height="75"></span></h2>
    <h1><span class="w3-hide-small"> ALL INDIA LAWYERS ASSOCIATION</span></h1>
  </header>
 <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="signup">
    <h2 class="w3-text-light-grey">You account details are :</h2>
	<?php
	session_start();
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'dbms');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($db->connect_error) die("Database access failed:" .$db->error);
	$regno=$_SESSION['regno'];
	?>
    <hr style="width:200px" >
    <p></p>
   <?php
   
   $query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pcttype,q.llb,q.llm,q.mphil,q.phd,e.ayearsdc,e.ayearshc,e.ayearssc,e.jyearsdc,e.jyearshc,e.jyearssc,d.designation,c.court_name,p.place_name,d.since
			from lawyers l,court c,place p,qualification q,experience e,designation d
			where l.regno='$regno'
			and q.regno='$regno'
			and e.regno='$regno'
			and d.regno='$regno'
			and d.court_abv=c.court_abv
			and d.place_id=p.place_id";
	$result=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
	$rows=$result->num_rows;
	for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		
		
		echo "<table>";
		for($k = 0 ;$k < 27 ; ++$k)
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
					echo "<th class='w3-text-light-grey'>state  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 9)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'> Pincode </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 10)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Contact no  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 11)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Email Id  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 12)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Preffered case type  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 13)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>LLB Grad Year</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 14)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>LLM Grad Year  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 15)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>M.Phil Grad Year </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 16)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>PhD Year</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 17)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Advocate expirience in District court  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 18)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Advocate expirience in High court  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 19)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Advocate expirience in Supreme court </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 20)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Judge expirience in District court  </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 21)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>judge expirience in High court </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 22)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Jugde expirience in Supreme court </th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			else if($k == 23)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Designation</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 24)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>working in</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 25)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Place of work</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 26)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>working in this designation since</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			
			
			
		}
		echo "</table>";
	}
		
		
   ?>
    </div>
    <div class="w3-padding-64 w3-content" id="admin">
    	<h2 class="w3-text-light-grey">Update your info</h2>
    	<hr style="width:200px" class="w3-opacity">
    	<p></p>
    	<p><a href="update.html"><button type="button">update</button></a></p>
    </div>
	<div class="pdf_button">
		<a href="createPdf.php">Convert as pdf</a>
	</div>

 <marquee> for referencing place_ids and court abbreviations <a href="place.html">click here..!</a></marquee>
</div>
<!-- END PAGE CONTENT -->


</body>
</html>
