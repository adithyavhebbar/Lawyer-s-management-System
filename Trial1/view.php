<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
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
</head>
<body id="page-top" >

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: black;">
    <div class="container" style="background-color: black;">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Ministry Of Law and Justice(India)<image src="img/e4.jpg" class="w3-image" width="50" height="75"></image></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
		<li class="nav-item mx-0 mx-lg-1">
            <a class=" nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="delete5.php" onmouseover="{this.style.backgroundColor='#343a40';this.style.color='white'}" onmouseout="this.style.backgroundColor='#000000'" onmouseout="this.style.backgroundColor='#fff'">Delete</a>
          </li>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class=" nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php" onmouseover="{this.style.backgroundColor='#343a40';this.style.color='white'}" onmouseout="this.style.backgroundColor='#000000'" onmouseout="this.style.backgroundColor='#fff'">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="signup" style="margin-top:9%">
	<?php
	session_start();
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'dbms');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($db->connect_error) die("Database access failed:" .$db->error);
	$regno=$_SESSION['regno'];
	setcookie('regno',$regno);
	?>
    <p><br></p>
   <?php
   
   $query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pctype,q.llb,q.llm,q.mphil,q.phd,d.designation,c.court_name,p.place_name
			from lawyers l,court c,place p,qualification q,designation d
			where l.regno='$regno'
			and q.regno='$regno'
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
		
		echo "<center>";
		echo "<table style='font-size:30px;'>";
		for($k = 0 ;$k < 20 ; ++$k)
		{
			
			if($k == 0)
			{
				echo "<tr>";
				echo "<th style='font-size:30px;' >Reg no  </th>";
					echo "<th>:  &nbsp; $row[$k]</th>";
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
					echo "<tr >";
					echo "<th class='w3-text-light-grey'>Qualifications</th>";
			}
			else if($k == 13)
			{
					if($row[$k]=='yes'){
					echo "<th class='w3-text-light-grey'>: &nbsp LLB";
					}
			}
			else if($k == 14)
			{	
				if($row[$k]=='yes'){
					echo ", LLM";
				}
			}
			else if($k == 15)
			{
				if($row[$k]=='yes'){
					echo " , M.Phil";
				}
			}
			else if($k == 16)
			{
				if($row[$k]=='yes'){
					echo ", PhD";
				}
			}
			else if($k == 17)
			{	
				echo "</tr>";
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Designation</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 18)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>working in</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
				else if($k == 19)
			{
				echo "<tr >";
					echo "<th class='w3-text-light-grey'>Place of work</th>";
					echo "<th class='w3-text-light-grey'>: &nbsp; $row[$k]<th>";
					echo "</tr>";
			}
			
			
			
		}
		
		echo "</table>";
		echo "</center>";
	}
		
		
   ?>
    </div>
 

<!-- END PAGE CONTENT -->


</body>
</html>
