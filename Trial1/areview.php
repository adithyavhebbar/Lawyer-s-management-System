<html>
<head>
	<link rel="stylesheet" href="bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css"/>
     <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
 
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: black;height:85px;">
        <div class="container" style="background-color: black;">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="color:white">Ministry Of Law and Justice(India)<image src="img/e4.jpg" class="w3-image" width="50" height="75"></image></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item mx-0 mx-lg-1">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php"  onmouseover="{this.style.backgroundColor='#343a40';this.style.color='white'}" onmouseout="this.style.backgroundColor='#000000'" onmouseout="this.style.backgroundColor='#fff'">LogOut</a>
               </li>
            </ul>
        </div>
        </div>
    </nav>
  
<?php
include('config.php');
	echo "<P align='right'><a href='adminwelcome.html'><button type='button' style='color:black;'>Back</button></a></p>";
$query = "select regno,name,doorno,street,locality,city,state,pincode,contact_no,email_id,pctype,llb,llm,mphil,phd,designation,court_abv,place_id from review";
$result=$db->query($query);
if(!$result) die("database access failed" .$db->error);
$rows=$result->num_rows;
// echo '<nav class="navbar navbar-inverse bg-dark">';
// echo '<div class="container-fluid">';
// echo'<div class="navbar-header">';
// echo '<span class="text-primary nav-header" style="font-weight: bold;">Lawyer\'s Association</span>';
// echo "</div>";
// echo '<ul class="nav navbar-nav navbar-right">';
// echo '<li><input type="button" class="btn btn-secondary" value="Logout" /></li>';
// echo '<li><a href="adminwelcome.html" class="btn btn-secondary" role="button">back</li>';
// echo '</ul>';
// echo '</div>';
// echo '</nav>';
echo '<br>';
if($rows == 0)
	{
        echo '<div class="jumbotron bg-info col-lg-8 ml-lg-5 text-danger col-sm-4">';
        echo "<p class='pl-lg-5' style='color:black;font-weight:40px;'>No Updations</p>";
        echo '</div>';
    }

else{
    $regno=array();
    $m=0;
    echo '<h3 class="text-uppercase mt-lg-3 font-weight-bold">Updates submitted</h3><br>';
for ($j = 0 ;$j < $rows ; ++$j)
	{
        echo"<div class='table-responsive'><table class='table table-bordered'><thead class='thead-dark'><tr class='thed-dark'><th>Reg no</th><th> Name</th><th>doorno</th><th>street</th><th>locality</th><th>city</th><th>state</th><th>pincode</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>llb</th><th>llm</th><th>mphil</th><th>phd</th><th>designation</th><th>court_abv</th><th>place_id</th></tr><thead>";
        $result->data_seek($j);
        $row=$result->fetch_array(MYSQLI_NUM);
        echo "<tbody class='table-info'><tr>";

		for ($k = 0; $k < 18; ++$k)
		{	
			if($k == 0)
			{
                $regno[$m]=$row[$k];
                $m++;
			}
			echo "<td>$row[$k]</td>";
        }
        echo '</tr></tbody></table></div><br>';
    }
    for ($k = 0; $k <$m; ++$k)
		{	

			$query="select l.regno,l.name,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pctype,q.llb,q.llm,q.mphil,q.phd,d.designation,d.court_abv,d.place_id
			    from lawyers l,qualification q,designation d
			    where l.regno='$regno[$k]'
			    and q.regno='$regno[$k]'
                and d.regno='$regno[$k]'";
            
            $res=$db->query($query);
	        if(!$result) die("Database access failed: " .$db->error);
            $rows=$res->num_rows;
            echo '<h3 class="text-uppercase mt-lg-3 ml-auto font-weight-bold">Current Data</h3>';
            echo '<div class="table-responsive"><table class="table table-bordered">';
            for ($j = 0 ;$j < $rows ; ++$j)
	        {
                echo"<table class='table table-bordered'><thead class='thead-dark'><tr class='thed-dark'><th>Reg no</th><th> Name</th><th>doorno</th><th>street</th><th>locality</th><th>city</th><th>state</th><th>pincode</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>llb</th><th>llm</th><th>mphil</th><th>phd</th><th>designation</th><th>court_abv</th><th>place_id</th></tr><thead>";
                echo "<tr>";
                for ($i = 0 ;$i < 1 ; ++$i)
		        {
			        $res->data_seek($j);
			        $row=$res->fetch_array(MYSQLI_NUM);
			        echo "<tr align='right'><tbody class='table-info'>";
			        for ($l = 0; $l < 18; ++$l)
			        {	
				        echo "<td>$row[$l]</td>";
                    }
                    echo '</tr><tbody>';
                }
            }
            echo "</table></div>";
            echo "<br>";
            echo "<table><tr><td>";
            echo '<div class="container-fluid ml-auto row">';
            echo "<form method='POST' action='accept.php' class='form-group row'>";
			echo "<select name='accept' class='form-control col-lg-10'>
					<option value='$regno[$k]'>Accept Changes</option>
						</select><input type='submit' class='btn btn-primary mt-lg-1' name='submit' value='Go'></td>";
            echo "</form> &emsp; &emsp; &emsp; &emsp;</td><td>";
            echo "<form method='POST' action='decline.php' class='form-group row'>";
			echo "<select name='decline' class='form-control col-lg-10'>
						<option value='$regno[$k]'>Decline Changes</option>
                    </select><input type='submit' class='btn btn-primary mt-lg-1' name='submit' value='Go'></td>";
                    echo "</form></td></tr></table>";
                    
            

        }
    }
        ?>
    </body>
</html>  