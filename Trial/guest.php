<!DOCTYPE html>
<html>
<title>Lawyers association</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<link rel='stylesheet' href='bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css' />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		font-family: "Montserrat", sans-serif
	}

	.w3-row-padding img {
		margin-bottom: 12px
	}

	/* Set the width of the sidebar to 120px */
	.w3-sidebar {
		width: 120px;
		background: #222;
	}

	/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
	#main {
		margin-left: 120px
	}

	/* Remove margins from "page content" on small screens */
	@media only screen and (max-width: 600px) {
		#main {
			margin-left: 0
		}
	}

	table,
	th,
	td {
		border: 1px solid white;
		border-collapse: collapse;
	}

	th,
	td {
		padding: 5px;
	}

	.tablehor {
		overflow-x: auto;
	}
</style>
</style>

<body class="w3-black">


	<!-- Sidebar/menu -->
	<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
		<div class="w3-container w3-display-container w3-padding-16">
			<i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
			<h3 class="w3-wide"><b>Lawyer's Association</b></h3>
		</div>
		<div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">

			<a href="#lawyers" onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn"> Lawyers<i class="fa fa-caret-down"></i></a>
			<div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
				<p>
					<form method='POST' action='l.php'>By Reg no<br><input style='color:black;' class="form-control" type='text' size='6' name='regno' placeholder='regno'><input style='color:black;' type='submit' class="btn btn-primary mt-lg-1 btn-sm ml-lg-1" value='go'></form>
				</p>
				<p>
					<form method='POST' action='p.php'>By Place<br>
						<select name="placeid" class="form-control">
							<option value="1">Banglore</option>
							<option value="2">Chennai</option>
							<option value="3">Delhi</option>
							<option value="4">Kolkata</option>
						</select>
						<input style='color:black;' type='submit' class="btn btn-primary btn-sm mt-lg-1" value='go'></form>
				</p>

				<p>
					<form method='POST' action='d.php'>By Designation<br>
						<select name="designation" class="form-control">
							<option value="public prosecutor">Public prosecutor</option>
							<option value="judge">Judge</option>
							<option value="Advocate">Advocate</option>
							<option value="Legal Advisor">Legal Advisor</option>
						</select>
						<input style='color:black;' type='submit' class="btn btn-primary btn-sm mt-lg-1" value='go'></form>
				</p>


			</div>




		</div>
		<!-- <h3 style='color:black;'>Association details</h3>
	<a href="nol.php" class="w3-bar-item w3-button">Number of lawyers enrolled</a>
	<a href="noc.php" class="w3-bar-item w3-button">Number of cases</a>
	<a href="nog.php" class="w3-bar-item w3-button">Number of Guests</a> -->

	</nav>


	<!-- Top menu on small screens -->
	<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
		<div class="w3-bar-item w3-padding-24 w3-wide">Lawyer's Association</div>
		<a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
	</header>

	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:250px">

		<!-- Push down content on small screens -->
		<div class="w3-hide-large" style="margin-top:83px"></div>

		<!-- Top header -->
		<form method="POST" action="lout.php">
			<P align="right"><input style="color:black;" type="submit" class="btn btn-info mr-lg-5" name="Log Out" value="logout"></p>
		</form>
		<header class="w3-container w3-xlarge">
			<p class="w3-left">Lawyer's Association</p>
			<p><br></p>
			<hr style="width:200px" class="w3-opacity">
			<p class="w3-right"></p>
		</header>
		<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="lawyers">
			<h2 class="w3-text-light-grey">Lawyers</h2>
			<hr style="width:200px" class="w3-opacity">

			<?php
			include('config.php');




			$query = "select l.regno,l.name,l.city,l.contact_no,l.email_id,l.pctype,d.designation,c.court_name,p.place_name,r.rating
			from lawyers l,court c,place p,qualification q,designation d,final_rating r
			where d.court_abv=c.court_abv
			and r.regno=l.regno
			and q.regno=l.regno
			and l.regno=d.regno
			and p.place_id=d.place_id";
			$result = $db->query($query);
			if (!$result) die("Database access failed: " . $db->error);
			$rows = $result->num_rows;
			echo "<div>";
			echo "<table class='table table-bordered table-info'><thead class='thead-dark'><tr><th>Reg no</th><th> Name</th><th>city</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>designation</th><th>court name</th><th>place</th><th>rating</th><th>rate</th></tr></thead>";
			for ($j = 0; $j < $rows; ++$j) {
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_NUM);
				echo "<tr align='right'>";
				for ($k = 0; $k < 10; ++$k) {
					if ($k == 0) {
						$regno = $row[$k];
					}
					echo "<td nowrap>$row[$k]</td>";
				}



				echo "<form method='POST' action='rate.php'>";
				echo " <td nowrap style='color:black;'>	<select name='rate'>
					<option value='$regno'>Rate </option>
				</select>
				&emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
				echo "</form>";

				echo "</tr>";
			}
			echo "</table>";
			echo "</div>";


			?>


		</div>

		<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="cases">
			<h2 class="w3-text-light-grey">Cases</h2>
			<hr style="width:200px" class="w3-opacity">
			<?php
			$query = "select c.case_id,c.case_title,c.cs_date,c.cc_date,c.c_type,c.judgement,co.court_name,p.place_name
				from cases c,place p,court co,clawyer cl
				where c.place_id=p.place_id
				and cl.case_id=c.case_id
				and co.court_abv=c.court_abv";
			$result = $db->query($query);
			if (!$result) die("database access failed" . $db->error);
			$rows = $result->num_rows;
			echo "<div class='tablehor'>";
			echo "<table class='table table-bordered table-info'><thead class='thead-dark'><tr><th>Case_id</th><th>Case Title</th><th>case start date</th><th>case close date</th><th>case type</th><th>judgement</th><th>court</th><th>place</th></tr></thead>";
			for ($j = 0; $j < $rows; ++$j) {
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_NUM);
				echo "<tr align='right'>";
				for ($k = 0; $k < 8; ++$k) {
					if ($k == 0) {
						$case_id = $row[$k];
					}
					echo "<td>$row[$k]</td>";
				}



				echo "</tr>";
			}
			echo "</table>";
			echo "</div>";


			?>

		</div>

		<!-- End page content -->
	</div>



	<script>
		// Accordion 
		function myAccFunc() {
			var x = document.getElementById("demoAcc");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
			} else {
				x.className = x.className.replace(" w3-show", "");
			}
		}

		// Click on the "Jeans" link on page load to open the accordion for demo purposes
		document.getElementById("myBtn").click();

		function w3_open() {
			document.getElementById("mySidebar").style.display = "block";
			document.getElementById("myOverlay").style.display = "block";
		}

		function w3_close() {
			document.getElementById("mySidebar").style.display = "none";
			document.getElementById("myOverlay").style.display = "none";
		}

		function myAccFunc1() {
			var x = document.getElementById("demoAcc1");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
			} else {
				x.className = x.className.replace(" w3-show", "");
			}
		}

		// Click on the "Jeans" link on page load to open the accordion for demo purposes
		document.getElementById("myBtn1").click();


		// Script to open and close sidebar
		// Script to open and close sidebar
		function w3_open() {
			document.getElementById("mySidebar").style.display = "block";
			document.getElementById("myOverlay").style.display = "block";
		}

		function w3_close() {
			document.getElementById("mySidebar").style.display = "none";
			document.getElementById("myOverlay").style.display = "none";
		}
	</script>

</body>

</html>